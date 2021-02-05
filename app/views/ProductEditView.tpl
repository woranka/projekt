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
                            <form action="{$conf->action_root}productSave" method="post" class="pure-form pure-form-aligned">
                                <legend>Dane produktu</legend>
                                <div class="top-margin">
                                    <label for="product_name">Nazwa produktu</label>
                                    <input id="product_name" type="text" placeholder="nazwa produktu" name="product_name" value="{$form->product_name}">
                                </div>
                                <div class="top-margin">
                                    <label for="category">Kategoria</label>
                                    <select name="category">
                                        {foreach $product as $p}
                                            <option value="{$p["category"]}">batony</option>
                                            <option value="{$p["category"]}">ciastka</option>
                                            <option value="{$p["category"]}">czekolady</option>
                                            <option value="{$p["category"]}">żelki</option>
                                        {/foreach}
                                    </select>
                                </div>
                                <div class="top-margin">
                                    <label for="price">Cena</label>
                                    <input id="price" type="text" placeholder="cena" name="price" value="{$form->price}">
                                </div>
                                <div class="top-margin">
                                    <label for="quantity">Ilość</label>
                                    <input id="quantity" type="text" placeholder="ilość" name="quantity" value="{$form->quantity}">
                                </div>
                                <div class="top margin" style="display: flex">
                                    <a class="pure-button button-secondary" style="width: 50%" href="{$conf->action_root}productList">Powrót</a>
                                    &nbsp;
                                    <input type="submit" class="pure-button pure-button-primary"  style="width: 50%" value="Zapisz"/>
                                </div>
                                <input type="hidden" name="IDproduct" value="{$form->IDproduct}">
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
