{include file='header.tpl'}

<h1>会員登録</h1>

{*ログインしているかどうかで分岐*}
{if $login=='yes'}
    <p>新しく会員登録をするにはログアウトしてください。</p>
{else}
    <form action="touroku.php" method="post">
        <ul>
            <li><label>ユーザー名：<input type="text" name="name"></label></li>
            <li><label>ユーザーID：<input type="text" name="id"></label></li>
            <li><label>パスワード：<input type="password" name="password"></label></li>
            <li><input type="submit" value="登録"></li>
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
            <p>会員登録が完了しました。</p>
            <ul>
                <li>ユーザー名：{$name}</li>
                <li>ユーザーID:{$id}</li>
                <li>パスワード：{$password}</li>
            </ul>
        {/if}
    {/if}
{/if}

{include file='footer.tpl'}