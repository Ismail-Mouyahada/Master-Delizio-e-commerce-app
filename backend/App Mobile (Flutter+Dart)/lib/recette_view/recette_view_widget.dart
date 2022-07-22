import '../backend/api_requests/api_calls.dart';
import '../composants/composant_theme.dart';
import '../composants/composant_util.dart';
import '../composants/composant_widgets.dart';
import '../main.dart';
import 'package:flutter/material.dart';
import 'package:google_fonts/google_fonts.dart';

class RecetteViewWidget extends StatefulWidget {
  const RecetteViewWidget({Key? key}) : super(key: key);

  @override
  _RecetteViewWidgetState createState() => _RecetteViewWidgetState();
}

class _RecetteViewWidgetState extends State<RecetteViewWidget> {
  final scaffoldKey = GlobalKey<ScaffoldState>();

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      key: scaffoldKey,
      backgroundColor: DelizioTheme.of(context).primaryBackground,
      body: FutureBuilder<ApiCallResponse>(
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
          return Column(
            mainAxisSize: MainAxisSize.max,
            children: [
              Row(
                mainAxisSize: MainAxisSize.min,
                mainAxisAlignment: MainAxisAlignment.start,
                crossAxisAlignment: CrossAxisAlignment.start,
                children: [
                  Expanded(
                    child: Container(
                      height: 240,
                      child: Stack(
                        alignment: AlignmentDirectional(-0.95, -0.7),
                        children: [
                          Align(
                            alignment: AlignmentDirectional(0, 0),
                            child: Image.network(
                              valueOrDefault<String>(
                                getJsonField(
                                  (columnFetchResponse.jsonBody ?? ''),
                                  r'''$[0]['main_image']''',
                                ),
                                'https://88f9-195-25-86-163.eu.ngrok.io/storage/recettes/placeholder.jpg',
                              ),
                              width: MediaQuery.of(context).size.width,
                              height: 240,
                              fit: BoxFit.cover,
                            ),
                          ),
                          Align(
                            alignment: AlignmentDirectional(-0.95, -0.55),
                            child: InkWell(
                              onTap: () async {
                                Navigator.pop(context);
                              },
                              child: Card(
                                clipBehavior: Clip.antiAliasWithSaveLayer,
                                color: Color(0xFFF5F5F5),
                                elevation: 3,
                                shape: RoundedRectangleBorder(
                                  borderRadius: BorderRadius.circular(100),
                                ),
                                child: Padding(
                                  padding: EdgeInsetsDirectional.fromSTEB(
                                      10, 10, 10, 10),
                                  child: Icon(
                                    Icons.arrow_back_rounded,
                                    color: DelizioTheme.of(context)
                                        .primaryColor,
                                    size: 24,
                                  ),
                                ),
                              ),
                            ),
                          ),
                        ],
                      ),
                    ),
                  ),
                ],
              ),
              Padding(
                padding: EdgeInsetsDirectional.fromSTEB(20, 16, 20, 0),
                child: Row(
                  mainAxisSize: MainAxisSize.max,
                  mainAxisAlignment: MainAxisAlignment.start,
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    Column(
                      mainAxisSize: MainAxisSize.max,
                      crossAxisAlignment: CrossAxisAlignment.start,
                      children: [
                        Text(
                          getJsonField(
                            (columnFetchResponse.jsonBody ?? ''),
                            r'''$[0]['id']''',
                          ).toString(),
                          style: DelizioTheme.of(context).bodyText2,
                        ),
                        Padding(
                          padding: EdgeInsetsDirectional.fromSTEB(0, 4, 0, 0),
                          child: Text(
                            getJsonField(
                              (columnFetchResponse.jsonBody ?? ''),
                              r'''$[0]['title']''',
                            ).toString(),
                            textAlign: TextAlign.start,
                            style: DelizioTheme.of(context).title2,
                          ),
                        ),
                      ],
                    ),
                  ],
                ),
              ),
              Padding(
                padding: EdgeInsetsDirectional.fromSTEB(20, 8, 20, 0),
                child: Row(
                  mainAxisSize: MainAxisSize.max,
                  mainAxisAlignment: MainAxisAlignment.end,
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    Column(
                      mainAxisSize: MainAxisSize.max,
                      crossAxisAlignment: CrossAxisAlignment.center,
                      children: [
                        Text(
                          'Cuisson(min)',
                          style: DelizioTheme.of(context).bodyText2,
                        ),
                        Padding(
                          padding: EdgeInsetsDirectional.fromSTEB(0, 4, 0, 0),
                          child: Text(
                            getJsonField(
                              (columnFetchResponse.jsonBody ?? ''),
                              r'''$[0]['temps_cuisson']''',
                            ).toString(),
                            textAlign: TextAlign.start,
                            style: DelizioTheme.of(context).subtitle1,
                          ),
                        ),
                      ],
                    ),
                    Padding(
                      padding: EdgeInsetsDirectional.fromSTEB(32, 0, 0, 0),
                      child: Column(
                        mainAxisSize: MainAxisSize.max,
                        crossAxisAlignment: CrossAxisAlignment.center,
                        children: [
                          Text(
                            'Prepa(min)',
                            style: DelizioTheme.of(context).bodyText2,
                          ),
                          Padding(
                            padding: EdgeInsetsDirectional.fromSTEB(0, 4, 0, 0),
                            child: Text(
                              getJsonField(
                                (columnFetchResponse.jsonBody ?? ''),
                                r'''$[0]['temps_preparation']''',
                              ).toString(),
                              textAlign: TextAlign.start,
                              style: DelizioTheme.of(context).subtitle1,
                            ),
                          ),
                        ],
                      ),
                    ),
                    Padding(
                      padding: EdgeInsetsDirectional.fromSTEB(32, 0, 0, 0),
                      child: Column(
                        mainAxisSize: MainAxisSize.max,
                        crossAxisAlignment: CrossAxisAlignment.start,
                        children: [
                          Text(
                            'Repos (min)',
                            style: DelizioTheme.of(context).bodyText2,
                          ),
                          Padding(
                            padding: EdgeInsetsDirectional.fromSTEB(0, 4, 0, 0),
                            child: Text(
                              getJsonField(
                                (columnFetchResponse.jsonBody ?? ''),
                                r'''$[0]['temps_repos']''',
                              ).toString(),
                              textAlign: TextAlign.start,
                              style: DelizioTheme.of(context).subtitle1,
                            ),
                          ),
                        ],
                      ),
                    ),
                  ],
                ),
              ),
              Padding(
                padding: EdgeInsetsDirectional.fromSTEB(20, 16, 20, 0),
                child: Row(
                  mainAxisSize: MainAxisSize.max,
                  mainAxisAlignment: MainAxisAlignment.start,
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    Expanded(
                      child: Column(
                        mainAxisSize: MainAxisSize.max,
                        crossAxisAlignment: CrossAxisAlignment.center,
                        children: [
                          Text(
                            'Gras',
                            style: DelizioTheme.of(context).bodyText2,
                          ),
                          Padding(
                            padding: EdgeInsetsDirectional.fromSTEB(0, 4, 0, 0),
                            child: Text(
                              getJsonField(
                                (columnFetchResponse.jsonBody ?? ''),
                                r'''$[0]['gras']''',
                              ).toString(),
                              textAlign: TextAlign.start,
                              style: DelizioTheme.of(context).subtitle2,
                            ),
                          ),
                        ],
                      ),
                    ),
                    Expanded(
                      child: Column(
                        mainAxisSize: MainAxisSize.max,
                        crossAxisAlignment: CrossAxisAlignment.center,
                        children: [
                          Text(
                            'Cholestérol ',
                            style: DelizioTheme.of(context).bodyText2,
                          ),
                          Row(
                            mainAxisSize: MainAxisSize.max,
                            mainAxisAlignment: MainAxisAlignment.center,
                            children: [
                              Padding(
                                padding:
                                    EdgeInsetsDirectional.fromSTEB(0, 4, 0, 0),
                                child: Text(
                                  getJsonField(
                                    (columnFetchResponse.jsonBody ?? ''),
                                    r'''$[0]['cholesterole ']''',
                                  ).toString(),
                                  textAlign: TextAlign.start,
                                  style: DelizioTheme.of(context).subtitle2,
                                ),
                              ),
                            ],
                          ),
                        ],
                      ),
                    ),
                  ],
                ),
              ),
              Padding(
                padding: EdgeInsetsDirectional.fromSTEB(20, 16, 20, 0),
                child: Row(
                  mainAxisSize: MainAxisSize.max,
                  mainAxisAlignment: MainAxisAlignment.start,
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    Expanded(
                      child: Column(
                        mainAxisSize: MainAxisSize.max,
                        crossAxisAlignment: CrossAxisAlignment.center,
                        children: [
                          Text(
                            'Proteines',
                            style: DelizioTheme.of(context).bodyText2,
                          ),
                          Padding(
                            padding: EdgeInsetsDirectional.fromSTEB(0, 4, 0, 0),
                            child: Text(
                              getJsonField(
                                (columnFetchResponse.jsonBody ?? ''),
                                r'''$[0]['proteines ']''',
                              ).toString(),
                              textAlign: TextAlign.start,
                              style: DelizioTheme.of(context).subtitle2,
                            ),
                          ),
                        ],
                      ),
                    ),
                    Expanded(
                      child: Column(
                        mainAxisSize: MainAxisSize.max,
                        crossAxisAlignment: CrossAxisAlignment.center,
                        children: [
                          Text(
                            'Carbohydrates ',
                            style: DelizioTheme.of(context).bodyText2,
                          ),
                          Padding(
                            padding: EdgeInsetsDirectional.fromSTEB(0, 4, 0, 0),
                            child: Text(
                              getJsonField(
                                (columnFetchResponse.jsonBody ?? ''),
                                r'''$[0]['carbohydrates ']''',
                              ).toString(),
                              textAlign: TextAlign.start,
                              style: DelizioTheme.of(context).subtitle2,
                            ),
                          ),
                        ],
                      ),
                    ),
                  ],
                ),
              ),
              Padding(
                padding: EdgeInsetsDirectional.fromSTEB(20, 16, 20, 0),
                child: Row(
                  mainAxisSize: MainAxisSize.max,
                  mainAxisAlignment: MainAxisAlignment.start,
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    Expanded(
                      child: Column(
                        mainAxisSize: MainAxisSize.max,
                        crossAxisAlignment: CrossAxisAlignment.start,
                        children: [
                          Text(
                            'Resumé',
                            style: DelizioTheme.of(context).bodyText2,
                          ),
                          Padding(
                            padding: EdgeInsetsDirectional.fromSTEB(0, 4, 0, 0),
                            child: Text(
                              getJsonField(
                                (columnFetchResponse.jsonBody ?? ''),
                                r'''$[0]['summary']''',
                              ).toString(),
                              textAlign: TextAlign.start,
                              style: DelizioTheme.of(context).subtitle2,
                            ),
                          ),
                        ],
                      ),
                    ),
                  ],
                ),
              ),
              Divider(),
              FFButtonWidget(
                onPressed: () async {
                  await Navigator.push(
                    context,
                    MaterialPageRoute(
                      builder: (context) => NavBarPage(initialPage: 'HomePage'),
                    ),
                  );
                },
                text: 'Accueil',
                options: FFButtonOptions(
                  width: 130,
                  height: 40,
                  color: Color(0xFFEF8C39),
                  textStyle: DelizioTheme.of(context).subtitle2.override(
                        fontFamily:
                            DelizioTheme.of(context).subtitle2Family,
                        color: Colors.white,
                      ),
                  borderSide: BorderSide(
                    color: Colors.transparent,
                    width: 1,
                  ),
                  borderRadius: BorderRadius.circular(12),
                ),
              ),
            ],
          );
        },
      ),
    );
  }
}
