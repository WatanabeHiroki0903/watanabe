{include file='header.tpl'}

<h1>ログイン</h1>

{*ログインしているかどうかで分岐*}
{if $login=='yes'}
    <p>既にログインしています。</p>
{else}
    <form action="login.php" method="post">
        <ul>
            <li><label>ユーザーID：<input type="text" name="id"></label></li>
            <li><label>パスワード：<input type="password" name="password"></label></li>
            <li><input type="submit" value="ログイン"></li>
        </ul>
    </form>
    {*値がポストされている時の処理*}
    {if $post=='yes'}
        {*エラーがあるかどうかで分岐*}
        {if $err=='yes'}
            <hr>
            <ul>
                {foreach from=$errors item=value}
                    <li>{$value}</li>
                {/foreach}
            </ul>
        {else}
            <hr>
            <p>ログインしました。</p>
            <p>ようこそ、{$name}さん。</p>
        {/if}
    {/if}
{/if}


{include file='footer.tpl'}