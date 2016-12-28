{include file='header.tpl'}

<h2 class="page-header">ログイン</h2>

{*ログインしているかどうかで分岐*}
{if $login=='yes'}
    <p>既にログインしています。</p>
{else}
    <div style="overflow:hidden;">
        <div style="float:left;">
            <form action="login.php" method="post">
                <ul>
                    <li><label>ユーザーID：<input type="text" name="id"></label></li>
                    <li><label>パスワード：<input type="password" name="password"></label></li>
                    <li><input type="submit" value="ログイン"></li>
                </ul>
            </form>
        </div>
        {*値がポストされている時の処理*}
        {if $post=='yes'}
            {*エラーがあるかどうかで分岐*}
            {if $err=='yes'}
                <div style="float:left;">
                    <ul>
                        {foreach from=$errors item=value}
                            <li>{$value}</li>
                        {/foreach}
                    </ul>
                </div>
            {else}
                <div style="float:left;">
                    <p>ログインしました。</p>
                    <p>ようこそ、{$name}さん。</p>
                </div>
            {/if}
        {/if}
    </div>
{/if}


{include file='footer.tpl'}