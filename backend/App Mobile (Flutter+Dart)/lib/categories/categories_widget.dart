import '../backend/api_requests/api_calls.dart';
import '../delizio_login/delizio_login_widget.dart';
import '../composants/composant_animations.dart';
import '../composants/composant_expanded_image_view.dart';
import '../composants/composant_icon_button.dart';
import '../composants/composant_theme.dart';
import '../composants/composant_util.dart';
import '../recette_view/recette_view_widget.dart';
import 'package:cached_network_image/cached_network_image.dart';
import 'package:easy_debounce/easy_debounce.dart';
import 'package:flutter/material.dart';
import 'package:page_transition/page_transition.dart';

class CategoriesWidget extends StatefulWidget {
  const CategoriesWidget({Key? key}) : super(key: key);

  @override
  _CategoriesWidgetState createState() => _CategoriesWidgetState();
}

class _CategoriesWidgetState extends State<CategoriesWidget>
    with TickerProviderStateMixin {
  TextEditingController? textController;
  final scaffoldKey = GlobalKey<ScaffoldState>();
  final animationsMap = {
    'containerOnPageLoadAnimation': AnimationInfo(
      trigger: AnimationTrigger.onPageLoad,
      duration: 1460,
      delay: 250,
      hideBeforeAnimating: true,
      fadeIn: true,
      initialState: AnimationState(
        offset: Offset(0, 0),
        scale: 1,
        opacity: 0.18,
      ),
      finalState: AnimationState(
        offset: Offset(0, 0),
        scale: 1,
        opacity: 1,
      ),
    ),
  };

  @override
  void initState() {
    super.initState();
    startPageLoadAnimations(
      animationsMap.values
          .where((anim) => anim.trigger == AnimationTrigger.onPageLoad),
      this,
    );

    textController = TextEditingController();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      key: scaffoldKey,
      appBar: AppBar(
        backgroundColor: Color(0xFF262D53),
        automaticallyImplyLeading: false,
        title: Text(
          'Bienvenue  Ismail',
          textAlign: TextAlign.start,
          style: DelizioTheme.of(context).title2.override(
                fontFamily: DelizioTheme.of(context).title2Family,
                color: Colors.white,
              ),
        ),
        actions: [
          Padding(
            padding: EdgeInsetsDirectional.fromSTEB(0, 0, 12, 0),
            child: FlutterFlowIconButton(
              borderColor: Colors.transparent,
              borderRadius: 30,
              borderWidth: 1,
              buttonSize: 60,
              icon: Icon(
                Icons.login,
                color: Colors.white,
                size: 30,
              ),
              onPressed: () async {
                await Navigator.push(
                  context,
                  MaterialPageRoute(
                    builder: (context) => DelizioLoginWidget(),
                  ),
                );
              },
            ),
          ),
        ],
        centerTitle: false,
        elevation: 0,
      ),
      backgroundColor: DelizioTheme.of(context).primaryBackground,
      body: GestureDetector(
        onTap: () => FocusScope.of(context).unfocus(),
        child: FutureBuilder<ApiCallResponse>(
          future: FetchCall.call(),
          builder: (context, snapshot) {
            // Customize what your widget looks like when it's loading.
            if (!snapshot.hasData) {
              return Center(
                child: SizedBox(
                  width: 50,
                  height: 50,
                  child: CircularProgressIndicator(
                    color: Color(0xFFEEA760),
                  ),
                ),
              );
            }
            final columnFetchResponse = snapshot.data!;
            return SingleChildScrollView(
              child: Column(
                mainAxisSize: MainAxisSize.max,
                crossAxisAlignment: CrossAxisAlignment.center,
                children: [
                  Container(
                    width: double.infinity,
                    height: 70,
                    decoration: BoxDecoration(
                      color: Color(0xFFFFBF11),
                      boxShadow: [
                        BoxShadow(
                          blurRadius: 5,
                          color: Color(0x27000000),
                          offset: Offset(0, 3),
                        )
                      ],
                    ),
                    child: Padding(
                      padding: EdgeInsetsDirectional.fromSTEB(16, 12, 16, 0),
                      child: FutureBuilder<ApiCallResponse>(
                        future: FetchCall.call(),
                        builder: (context, snapshot) {
                          // Customize what your widget looks like when it's loading.
                          if (!snapshot.hasData) {
                            return Center(
                              child: SizedBox(
                                width: 50,
                                height: 50,
                                child: CircularProgressIndicator(
                                  color: Color(0xFFEEA760),
                                ),
                              ),
                            );
                          }
                          final textFieldFetchResponse = snapshot.data!;
                          return TextFormField(
                            controller: textController,
                            onChanged: (_) => EasyDebounce.debounce(
                              'textController',
                              Duration(milliseconds: 2000),
                              () => setState(() {}),
                            ),
                            onFieldSubmitted: (_) async {
                              await FetchCall.call();
                            },
                            obscureText: false,
                            decoration: InputDecoration(
                              labelText: 'chercher une recette ',
                              labelStyle: DelizioTheme.of(context).bodyText2,
                              enabledBorder: OutlineInputBorder(
                                borderSide: BorderSide(
                                  color: Color(0x00000000),
                                  width: 1,
                                ),
                                borderRadius: BorderRadius.circular(12),
                              ),
                              focusedBorder: OutlineInputBorder(
                                borderSide: BorderSide(
                                  color: Color(0x00000000),
                                  width: 1,
                                ),
                                borderRadius: BorderRadius.circular(12),
                              ),
                              filled: true,
                              fillColor:
                                  DelizioTheme.of(context).secondaryBackground,
                              prefixIcon: Icon(
                                Icons.search_rounded,
                                color: DelizioTheme.of(context).secondaryText,
                              ),
                            ),
                            style: DelizioTheme.of(context).bodyText1,
                          );
                        },
                      ),
                    ),
                  ),
                  Padding(
                    padding: EdgeInsetsDirectional.fromSTEB(0, 12, 0, 44),
                    child: Builder(
                      builder: (context) {
                        final items = getJsonField(
                              (columnFetchResponse.jsonBody ?? ''),
                              r'''$''',
                            )?.toList() ??
                            [];
                        return Wrap(
                          spacing: 8,
                          runSpacing: 8,
                          alignment: WrapAlignment.start,
                          crossAxisAlignment: WrapCrossAlignment.start,
                          direction: Axis.horizontal,
                          runAlignment: WrapAlignment.start,
                          verticalDirection: VerticalDirection.down,
                          clipBehavior: Clip.none,
                          children: List.generate(items.length, (itemsIndex) {
                            final itemsItem = items[itemsIndex];
                            return InkWell(
                              onTap: () async {
                                await Navigator.push(
                                  context,
                                  PageTransition(
                                    type: PageTransitionType.fade,
                                    duration: Duration(milliseconds: 300),
                                    reverseDuration:
                                        Duration(milliseconds: 300),
                                    child: RecetteViewWidget(),
                                  ),
                                );
                              },
                              child: Container(
                                width: MediaQuery.of(context).size.width * 0.9,
                                height: 300,
                                decoration: BoxDecoration(
                                  color: DelizioTheme.of(context)
                                      .secondaryBackground,
                                  boxShadow: [
                                    BoxShadow(
                                      blurRadius: 4,
                                      color: Color(0x230E151B),
                                      offset: Offset(0, 2),
                                    )
                                  ],
                                  borderRadius: BorderRadius.circular(12),
                                ),
                                child: Padding(
                                  padding: EdgeInsetsDirectional.fromSTEB(
                                      9, 9, 9, 9),
                                  child: Column(
                                    mainAxisSize: MainAxisSize.max,
                                    mainAxisAlignment: MainAxisAlignment.start,
                                    crossAxisAlignment:
                                        CrossAxisAlignment.stretch,
                                    children: [
                                      FutureBuilder<ApiCallResponse>(
                                        future: FetchCall.call(),
                                        builder: (context, snapshot) {
                                          // Customize what your widget looks like when it's loading.
                                          if (!snapshot.hasData) {
                                            return Center(
                                              child: SizedBox(
                                                width: 50,
                                                height: 50,
                                                child:
                                                    CircularProgressIndicator(
                                                  color: Color(0xFFEEA760),
                                                ),
                                              ),
                                            );
                                          }
                                          final imageFetchResponse =
                                              snapshot.data!;
                                          return InkWell(
                                            onTap: () async {
                                              await Navigator.push(
                                                context,
                                                PageTransition(
                                                  type: PageTransitionType.fade,
                                                  child:
                                                      FlutterFlowExpandedImageView(
                                                    image: CachedNetworkImage(
                                                      imageUrl: valueOrDefault<
                                                          String>(
                                                        getJsonField(
                                                          itemsItem,
                                                          r'''$.main_image''',
                                                        ),
                                                        'https://88f9-195-25-86-163.eu.ngrok.io/storage/recettes/placeholder.jpg',
                                                      ),
                                                      fit: BoxFit.contain,
                                                    ),
                                                    allowRotation: false,
                                                    tag: valueOrDefault<String>(
                                                      getJsonField(
                                                        itemsItem,
                                                        r'''$.main_image''' +
                                                            '$itemsIndex',
                                                      ),
                                                      'https://88f9-195-25-86-163.eu.ngrok.io/storage/recettes/placeholder.jpg',
                                                    ),
                                                    useHeroAnimation: true,
                                                  ),
                                                ),
                                              );
                                            },
                                            child: Hero(
                                              tag: valueOrDefault<String>(
                                                getJsonField(
                                                  itemsItem,
                                                  r'''$.main_image''' +
                                                      '$itemsIndex',
                                                ),
                                                'https://88f9-195-25-86-163.eu.ngrok.io/storage/recettes/placeholder.jpg',
                                              ),
                                              transitionOnUserGestures: true,
                                              child: ClipRRect(
                                                borderRadius:
                                                    BorderRadius.circular(10),
                                                child: CachedNetworkImage(
                                                  imageUrl:
                                                      valueOrDefault<String>(
                                                    getJsonField(
                                                      itemsItem,
                                                      r'''$.main_image''',
                                                    ),
                                                    'https://88f9-195-25-86-163.eu.ngrok.io/storage/recettes/placeholder.jpg',
                                                  ),
                                                  width: double.infinity,
                                                  height: MediaQuery.of(context)
                                                          .size
                                                          .height *
                                                      0.2,
                                                  fit: BoxFit.cover,
                                                ),
                                              ),
                                            ),
                                          );
                                        },
                                      ),
                                      Padding(
                                        padding: EdgeInsetsDirectional.fromSTEB(
                                            8, 12, 0, 0),
                                        child: Text(
                                          getJsonField(
                                            itemsItem,
                                            r'''$.title''',
                                          ).toString(),
                                          style: DelizioTheme.of(context)
                                              .subtitle1
                                              .override(
                                                fontFamily:
                                                    DelizioTheme.of(context)
                                                        .subtitle1Family,
                                                color: Color(0xFFEEC360),
                                              ),
                                        ),
                                      ),
                                      FutureBuilder<ApiCallResponse>(
                                        future: FetchOneRecipeCall.call(),
                                        builder: (context, snapshot) {
                                          // Customize what your widget looks like when it's loading.
                                          if (!snapshot.hasData) {
                                            return Center(
                                              child: SizedBox(
                                                width: 50,
                                                height: 50,
                                                child:
                                                    CircularProgressIndicator(
                                                  color: Color(0xFFEEA760),
                                                ),
                                              ),
                                            );
                                          }
                                          final textFetchOneRecipeResponse =
                                              snapshot.data!;
                                          return Text(
                                            getJsonField(
                                              itemsItem,
                                              r'''$.summary''',
                                            ).toString(),
                                            maxLines: 3,
                                            style: DelizioTheme.of(context)
                                                .bodyText1
                                                .override(
                                                  fontFamily:
                                                      DelizioTheme.of(context)
                                                          .bodyText1Family,
                                                  color:
                                                      DelizioTheme.of(context)
                                                          .gray600,
                                                  fontWeight: FontWeight.normal,
                                                ),
                                          );
                                        },
                                      ),
                                    ],
                                  ),
                                ),
                              ),
                            ).animated([
                              animationsMap['containerOnPageLoadAnimation']!
                            ]);
                          }),
                        );
                      },
                    ),
                  ),
                ],
              ),
            );
          },
        ),
      ),
    );
  }
}
