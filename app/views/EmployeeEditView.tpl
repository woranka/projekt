{extends file="main.tpl"}

{block name=content}
    <header id="head" class="secondary"></header> 
    <div class="container">
              
        <ol class="breadcrumb">
            <li><a href="{$conf->action_root}start">Start</a></li>
            <li class="active">Panel pracownika</li>
        </ol><br/>
        
        <div class="row">
            <article class="col-xs-12 maincontent">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form action="{$conf->action_root}employeeSave" method="post" class="pure-form pure-form-aligned">
                                <legend>Dane pracownika</legend>
                                <div class="top-margin">
                                    <label for="name">Imię</label>
                                    <input id="name" type="text" placeholder="imię" name="name" value="{$form->name}">
                                </div>
                                <div class="top-margin">
                                    <label for="surname">Nazwisko</label>
                                    <input id="surname" type="text" placeholder="nazwisko" name="surname" value="{$form->surname}">
                                </div>
                                <div class="top-margin">
                                    <label for="phone_number">Nr telefonu</label>
                                    <input id="phone_number" type="text" placeholder="nr telefonu" name="phone_number" value="{$form->phone_number}">
                                </div>
                                <div class="top-margin">
                                    <label for="email">Email</label>
                                    <input id="email" type="text" placeholder="email" name="email" value="{$form->email}">
                                </div>
                                <div class="top-margin">
                                    <label for="hire_date">Data zatrudnienia</label>
                                    <input id="hire_date" type="text" placeholder="data zatrudnienia [Y-m-d]" name="hire_date" value="{$form->hire_date}">
                                </div>
                                <div class="top-margin">
                                    <label for="login">Login</label>
                                    <input id="login" type="text" placeholder="login" name="login" value="{$form->login}">
                                </div>
                                <div class="top-margin">
                                    <label for="password">Hasło</label>
                                    <input id="password" type="text" placeholder="hasło" name="password" value="{$form->password}">
                                </div>
                                <div class="top-margin">
                                    <label for="role">Rola pracownika</label>
                                    <input id="role" type="text" placeholder="rola [admin/user]" name="role" value="{$form->role}">
                                </div>
                                <div class="top margin" style="display: flex">
                                    <a class="pure-button button-secondary" style="width: 35%" href="{$conf->action_root}employeeList">Powrót</a>
                                    &nbsp;
                                    <input type="submit" class="pure-button pure-button-primary"  style="width: 65%" value="Zapisz"/>
                                </div>
                                <input type="hidden" name="IDemployee" value="{$form->IDemployee}">
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


