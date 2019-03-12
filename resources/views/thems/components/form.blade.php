<ul class="tabs">
    <li class="tab"><a href="#" id="link_16" class="linkopen"
                       onclick="tabshow('module_16');return false">Login Form</a></li>
    <li class="tab"><a href="#" id="link_90" class="linkopen"
                       onclick="tabshow('module_90');return false">Newsletter</a></li>
</ul>
<div tabindex="-1" class="tabcontent tabopen" id="module_16">
    <form action="#" method="post" id="login-form">

        <fieldset class="userdata">

            <p id="form-login-username">

                <label for="modlgn-username">Username</label>

                <input id="modlgn-username" type="text" name="username" class="inputbox" size="18"/>

            </p>

            <p id="form-login-password">

                <label for="modlgn-passwd">Password</label>

                <input id="modlgn-passwd" type="password" name="password" class="inputbox"
                       size="18"/>

            </p>

            <div id="form-login-secretkey" class="control-group">

                <div class="controls">

                    <div class="input-prepend input-append">

                        <label for="modlgn-secretkey">Secret Key</label>

                        <input id="modlgn-secretkey" autocomplete="off" type="text" name="secretkey"
                               class="input-small" tabindex="0" size="18"/>

                    </div>

                </div>

            </div>

            <p id="form-login-remember">

                <label for="modlgn-remember">Remember Me</label>

                <input id="modlgn-remember" type="checkbox" name="remember" class="inputbox"
                       value="yes"/>

            </p>

            <input type="submit" name="Submit" class="button" value="Log in"/>

            <input type="hidden" name="option" value="com_users"/>

            <input type="hidden" name="task" value="user.login"/>

            <input type="hidden" name="return" value="aW5kZXgucGhwP0l0ZW1pZD0xMDE="/>

            <input type="hidden" name="b9aefa7288913ecca4c6aefb361a1c9a" value="1"/>
            <ul>

                <li><a href="#"> Forgot your password?</a></li>

                <li><a href="#"> Forgot your username?</a> </li>

                <li><a href="#"> Create an account</a></li>

            </ul>

        </fieldset>

    </form>

    <a href="#" class="unseen" onclick="nexttab('module_16');return false;" id="next_16">Next
        Tab</a></div>
<div tabindex="-1" class="tabcontent tabopen" id="module_90">
    <div class="acymailing_module" id="acymailing_module_formAcymailing78571">

        <div class="acymailing_mootoolsbutton" id="acymailing_toggle_formAcymailing78571">

            <p><a class="acymailing_togglemodule" id="acymailing_togglemodule_formAcymailing78571"
                  href="#subscribe">Subscribe</a></p>

            <div class="acymailing_fulldiv" id="acymailing_fulldiv_formAcymailing78571">

                <form id="formAcymailing78571" action="http://www.edrone.unisannio.it/index.php"
                      onsubmit="return submitacymailingform('optin','formAcymailing78571')"
                      method="post" name="formAcymailing78571">

                    <div class="acymailing_module_form">

                        <table class="acymailing_form">

                            <tr>

                                <td class="acyfield_name acy_requiredField">

                                    <input id="user_name_formAcymailing78571"
                                           onfocus="if(this.value == 'Name') this.value = '';"
                                           onblur="if(this.value=='') this.value='Name';"
                                           class="inputbox" type="text" name="user[name]"
                                           style="width:80%" value="Name" title="Name"/>

                                </td>
                            </tr>
                            <tr>
                                <td class="acyfield_email acy_requiredField">

                                    <input id="user_email_formAcymailing78571"
                                           onfocus="if(this.value == 'E-mail') this.value = '';"
                                           onblur="if(this.value=='') this.value='E-mail';"
                                           class="inputbox" type="text" name="user[email]"
                                           style="width:80%" value="E-mail" title="E-mail"/>

                                </td>
                            </tr>
                            <tr>

                                <td class="acysubbuttons">

                                    <input class="button subbutton btn btn-primary" type="submit"
                                           value="Subscribe" name="Submit"
                                           onclick="try{ return submitacymailingform('optin','formAcymailing78571'); }catch(err){alert('The form could not be submitted '+err);return false;}"/>

                                </td>

                            </tr>

                        </table>

                        <input type="hidden" name="ajax" value="0"/>

                        <input type="hidden" name="acy_source" value="module_90"/>

                        <input type="hidden" name="ctrl" value="sub"/>

                        <input type="hidden" name="task" value="notask"/>

                        <input type="hidden" name="redirect"
                               value="http%3A%2F%2Fwww.edrone.unisannio.it%2F"/>

                        <input type="hidden" name="redirectunsub"
                               value="http%3A%2F%2Fwww.edrone.unisannio.it%2F"/>

                        <input type="hidden" name="option" value="com_acymailing"/>

                        <input type="hidden" name="hiddenlists" value="1"/>

                        <input type="hidden" name="acyformname" value="formAcymailing78571"/>

                        <input type="hidden" name="Itemid" value="101"/></div>

                </form>

            </div>

        </div>
    </div>

</div>
