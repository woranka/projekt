{extends file="main.tpl"}

{block name=content}
    <header id="head" class="secondary"></header> 
    <div class="container">
              
        <ol class="breadcrumb">
            <li><a href="{$conf->action_root}start">Start</a></li>
            <li class="active">Logowanie</li>
        </ol>

        <div class="row">
            <article class="col-xs-12 maincontent">
                <header class="page-header">
                    <h1 class="page-title">Zaloguj się</h1>
                </header>            
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form action="{$conf->action_root}login" method="post">
                                <div class="top-margin">
                                    <label for="id_login">Login</label>
                                    <input id="id_login" type="text" name="login" value="{$form->login}" class="form-control">
                                </div>

                                <div class="top-margin">
                                    <label for="id_password">Hasło</label>
                                    <input id="id_password" type="password" name="password" class="form-control">
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col-lg-12 text-right">
                                        <button type="submit" value="zaloguj" class="btn btn-action">Zaloguj</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                {block name=messages}
                    {if $msgs->isMessage()}
                        <div class="messages">
                            <ul>
                            {foreach $msgs->getMessages() as $msg}
                            {strip}
                                <li class="msg {if $msg->isError()}error{/if} {if $msg->isWarning()}warning{/if} {if $msg->isInfo()}info{/if}">{$msg->text}</li>
                            {/strip}
                            {/foreach}
                            </ul>
                        </div>
                    {/if}
                {/block}
                </div>
            </article>
        </div>
    </div>
{/block}