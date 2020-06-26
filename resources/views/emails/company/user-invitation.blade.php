@extends('layouts.email')

@section('title', 'Invitation to join a company')

@section('body')

    <div tabindex="-1" class="letter-body__body-content">
        <div class="html-parser">
            <div class="html-fishing">
                <div class="html-expander">
                    <div class="js-helper js-readmsg-msg">
                        <style type="text/css"></style>
                        <div>
                            <div id="style_15915530541280273891_BODY">
                                <div class="cl_603725">
                                    <table class="wrapper_mr_css_attr" width="100%" cellpadding="0" cellspacing="0"
                                           role="presentation"
                                           style="box-sizing: border-box;font-family: -apple-system, BlinkMacSystemFont,
                                            'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji',
                                             'Segoe UI Emoji', 'Segoe UI Symbol';-premailer-cellpadding:
                                              0;-premailer-cellspacing: 0;-premailer-width: 100%;background-color:
                                              #edf2f7;margin: 0;padding: 0;width: 100%;">
                                        <tbody>
                                        <tr>
                                            <td align="center"
                                                style="box-sizing: border-box;font-family: -apple-system,
                                                 BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial,
                                                 sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';">
                                                <table class="content_mr_css_attr" width="100%" cellpadding="0"
                                                       cellspacing="0" role="presentation"
                                                       style="box-sizing: border-box;font-family: -apple-system,
                                                        BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial,
                                                        sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji',
                                                        'Segoe UI Symbol';-premailer-cellpadding:
                                                         0;-premailer-cellspacing: 0;
                                                         -premailer-width: 100%;margin: 0;padding: 0;width: 100%;">
                                                    <tbody>
                                                    <tr>
                                                        <td class="header_mr_css_attr"
                                                            style="box-sizing: border-box;
                                                            font-family: -apple-system, BlinkMacSystemFont,
                                                            'Segoe UI', Roboto, Helvetica, Arial, sans-serif,
                                                             'Apple Color Emoji', 'Segoe UI Emoji',
                                                             'Segoe UI Symbol';padding: 25px 0;text-align: center;">
                                                            <a href="https://spreadfilms.loc/"
                                                               style="box-sizing: border-box;font-family: -apple-system,
                                                               BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial,
                                                               sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji',
                                                               'Segoe UI Symbol';color: #3d4852;font-size:
                                                               19px;font-weight: bold;text-decoration: none;display: inline-block;"
                                                               target="_blank" rel=" noopener noreferrer">
                                                                SpreadFilms
                                                            </a>
                                                        </td>
                                                    </tr>


                                                    <tr>
                                                        <td class="body_mr_css_attr" width="100%" cellpadding="0"
                                                            cellspacing="0"
                                                            style="box-sizing: border-box;font-family: -apple-system,
                                                             BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial,
                                                             sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji',
                                                             'Segoe UI Symbol';-premailer-cellpadding:
                                                              0;-premailer-cellspacing: 0;-premailer-width:
                                                               100%;background-color: #edf2f7;border-bottom:
                                                               1px solid #edf2f7;border-top: 1px solid #edf2f7;margin:
                                                                0;padding: 0;width: 100%;">
                                                            <table class="inner-body_mr_css_attr" align="center"
                                                                   width="570" cellpadding="0" cellspacing="0"
                                                                   role="presentation"
                                                                   style="box-sizing: border-box;font-family:
                                                                   -apple-system, BlinkMacSystemFont, 'Segoe UI',
                                                                   Roboto, Helvetica, Arial, sans-serif,
                                                                   'Apple Color Emoji', 'Segoe UI Emoji',
                                                                    'Segoe UI Symbol';-premailer-cellpadding:
                                                                    0;-premailer-cellspacing: 0;-premailer-width:
                                                                    570px;background-color: #ffffff;border-color:
                                                                    #e8e5ef;border-radius: 2px;border-width:
                                                                    1px;box-shadow: 0 2px 0 rgba(0, 0, 150, 0.025),
                                                                    2px 4px 0 rgba(0, 0, 150, 0.015);
                                                                    margin: 0 auto;padding: 0;width: 570px;">

                                                                <tbody>
                                                                <tr>
                                                                    <td class="content-cell_mr_css_attr"
                                                                        style="box-sizing: border-box;
                                                                        font-family: -apple-system,
                                                                         BlinkMacSystemFont, 'Segoe UI',
                                                                          Roboto, Helvetica, Arial, sans-serif,
                                                                          'Apple Color Emoji', 'Segoe UI Emoji',
                                                                          'Segoe UI Symbol';max-width: 100vw;padding: 32px;">
                                                                        <h1 style="box-sizing: border-box;
                                                                        font-family: -apple-system, BlinkMacSystemFont,
                                                                         'Segoe UI', Roboto, Helvetica, Arial, sans-serif,
                                                                         'Apple Color Emoji', 'Segoe UI Emoji',
                                                                          'Segoe UI Symbol';color: #3d4852;font-size: 18px;
                                                                          font-weight: bold;margin-top: 0;text-align: left;">
                                                                            Hello!</h1>
                                                                        <p style="box-sizing: border-box;font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';font-size: 16px;line-height: 1.5em;margin-top: 0;text-align: left;">
                                                                            Please click the button below to accept the
                                                                            invitation from company
                                                                            <strong>{{ $data['company_name'] }}</strong>.
                                                                        </p>
                                                                        <p>Your password:</p>
                                                                        <p><strong>{{ $data['password'] }}</strong></p>
                                                                        <table class="action_mr_css_attr" align="center"
                                                                               width="100%" cellpadding="0"
                                                                               cellspacing="0" role="presentation"
                                                                               style="box-sizing: border-box;font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';-premailer-cellpadding: 0;-premailer-cellspacing: 0;-premailer-width: 100%;margin: 30px auto;padding: 0;text-align: center;width: 100%;">
                                                                            <tbody>
                                                                            <tr>
                                                                                <td align="center"
                                                                                    style="box-sizing: border-box;font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';">
                                                                                    <table width="100%" border="0"
                                                                                           cellpadding="0"
                                                                                           cellspacing="0"
                                                                                           role="presentation"
                                                                                           style="box-sizing: border-box;font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';">
                                                                                        <tbody>
                                                                                        <tr>
                                                                                            <td align="center"
                                                                                                style="box-sizing: border-box;font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';">
                                                                                                <table border="0"
                                                                                                       cellpadding="0"
                                                                                                       cellspacing="0"
                                                                                                       role="presentation"
                                                                                                       style="box-sizing: border-box;font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';">
                                                                                                    <tbody>
                                                                                                    <tr>
                                                                                                        <td style="box-sizing: border-box;font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';">
                                                                                                            <a href="{{ env('APP_URL') }}accept-invitation/{{ $data['invite-uuid'] }}"
                                                                                                               class="button_mr_css_attr button-primary_mr_css_attr"
                                                                                                               target="_blank"
                                                                                                               style="box-sizing: border-box;font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';-webkit-text-size-adjust: none;border-radius: 4px;color: #fff;display: inline-block;overflow: hidden;text-decoration: none;background-color: #2d3748;border-bottom: 8px solid #2d3748;border-left: 18px solid #2d3748;border-right: 18px solid #2d3748;border-top: 8px solid #2d3748;"
                                                                                                               rel=" noopener noreferrer">Accept
                                                                                                                Invitation</a>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </td>
                                                                                        </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                        <p style="box-sizing: border-box;font-family:
                                                                        -apple-system, BlinkMacSystemFont, 'Segoe UI',
                                                                         Roboto, Helvetica, Arial, sans-serif,
                                                                         'Apple Color Emoji', 'Segoe UI Emoji',
                                                                         'Segoe UI Symbol';font-size: 16px;line-height:
                                                                          1.5em;margin-top: 0;text-align: left;">
                                                                            If you do not expect any invites, no further
                                                                            action is required.</p>
                                                                        <p style="box-sizing: border-box;font-family:
                                                                        -apple-system, BlinkMacSystemFont, 'Segoe UI',
                                                                        Roboto, Helvetica, Arial, sans-serif,
                                                                        'Apple Color Emoji', 'Segoe UI Emoji',
                                                                        'Segoe UI Symbol';font-size: 16px;line-height:
                                                                         1.5em;margin-top: 0;text-align: left;">
                                                                            Regards,<br>
                                                                            SpreadFilms</p>


                                                                        <table class="subcopy_mr_css_attr" width="100%"
                                                                               cellpadding="0" cellspacing="0"
                                                                               role="presentation"
                                                                               style="box-sizing: border-box;font-family:
                                                                               -apple-system, BlinkMacSystemFont, 'Segoe UI',
                                                                               Roboto, Helvetica, Arial, sans-serif,
                                                                               'Apple Color Emoji', 'Segoe UI Emoji',
                                                                               'Segoe UI Symbol';border-top: 1px solid
                                                                               #e8e5ef;margin-top: 25px;padding-top: 25px;">
                                                                            <tbody>
                                                                            <tr>
                                                                                <td style="box-sizing: border-box;
                                                                                font-family: -apple-system,
                                                                                 BlinkMacSystemFont, 'Segoe UI',
                                                                                  Roboto, Helvetica, Arial,
                                                                                   sans-serif, 'Apple Color Emoji',
                                                                                   'Segoe UI Emoji', 'Segoe UI Symbol';">
                                                                                    <p style="box-sizing: border-box;
                                                                                    font-family: -apple-system,
                                                                                    BlinkMacSystemFont, 'Segoe UI',
                                                                                    Roboto, Helvetica, Arial, sans-serif,
                                                                                    'Apple Color Emoji', 'Segoe UI Emoji',
                                                                                    'Segoe UI Symbol';line-height:
                                                                                     1.5em;margin-top: 0;text-align: left;
                                                                                     font-size: 14px;">
                                                                                        If you’re having trouble
                                                                                        clicking the "Accept Invitation"
                                                                                        button, copy and paste
                                                                                        the URL below
                                                                                        into your web browser: <span
                                                                                            class="break-all_mr_css_attr"
                                                                                            style="box-sizing: border-box;font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';word-break: break-all;"><a
                                                                                                href="{{ env('APP_URL') }}accept-invitation/{{ $data['invite-uuid'] }}"
                                                                                                style="box-sizing: border-box;font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';color: #3869d4;"
                                                                                                target="_blank"
                                                                                                rel=" noopener noreferrer">{{ env('APP_URL') }}accept-invitation/{{ $data['invite-uuid'] }}</a></span>
                                                                                    </p>
                                                                                </td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td style="box-sizing: border-box;font-family: -apple-system,
                                                        BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial,
                                                         sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';">
                                                            <table class="footer_mr_css_attr" align="center" width="570"
                                                                   cellpadding="0" cellspacing="0" role="presentation"
                                                                   style="box-sizing: border-box;font-family:
                                                                    -apple-system, BlinkMacSystemFont, 'Segoe UI',
                                                                     Roboto, Helvetica, Arial, sans-serif,
                                                                      'Apple Color Emoji', 'Segoe UI Emoji',
                                                                      'Segoe UI Symbol';-premailer-cellpadding:
                                                                       0;-premailer-cellspacing: 0;-premailer-width:
                                                                        570px;margin: 0 auto;padding: 0;text-align:
                                                                         center;width: 570px;">
                                                                <tbody>
                                                                <tr>
                                                                    <td class="content-cell_mr_css_attr" align="center"
                                                                        style="box-sizing: border-box;font-family:
                                                                        -apple-system, BlinkMacSystemFont, 'Segoe UI',
                                                                        Roboto, Helvetica, Arial, sans-serif,
                                                                        'Apple Color Emoji', 'Segoe UI Emoji',
                                                                        'Segoe UI Symbol';max-width: 100vw;padding: 32px;">
                                                                        <p style="box-sizing: border-box;font-family:
                                                                         -apple-system, BlinkMacSystemFont, 'Segoe UI',
                                                                         Roboto, Helvetica, Arial, sans-serif,
                                                                         'Apple Color Emoji', 'Segoe UI Emoji',
                                                                         'Segoe UI Symbol';line-height: 1.5em;margin-top:
                                                                         0;color: #b0adc5;font-size: 12px;text-align: center;">
                                                                            © 2020 {{ env('APP_NAME') }}. All rights
                                                                            reserved.</p>

                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>@media only screen and (max-width: 600px) {
            .cl_603725 .inner-body_mr_css_attr {
                width: 100% !important;
            }

            .cl_603725 .footer_mr_css_attr {
                width: 100% !important;
            }
        }

        @media only screen and (max-width: 500px) {
            .cl_603725 .button_mr_css_attr {
                width: 100% !important;
            }
        }
    </style>
@endsection
