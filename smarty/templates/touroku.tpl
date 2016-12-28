{include file='header.tpl'}

<h2 class="page-header">会員登録</h2>

{*ログインしているかどうかで分岐*}
{if $login=='yes'}
    <p>新しく会員登録をするにはログアウトしてください。</p>
{else}
    <div style="overflow:hidden;">
        <div style="float:left;">
            <form action="touroku.php" method="post">
                <ul>
                    <li><label>ユーザー名：<input type="text" name="name"></label></li>
                    <li><label>ユーザーID：<input type="text" name="id" placeholder="英数字のみ"></label></li>
                    <li><label>パスワード：<input type="password" name="password"></label></li>
                    <li><input type="submit" value="登録"></li>
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
                    <p>会員登録が完了しました。</p>
                    <ul>
                        <li>ユーザー名：{$name}</li>
                        <li>ユーザーID:{$id}</li>
                        <li>パスワード：{$password}</li>
                    </ul>
                </div>
            {/if}
        {/if}
    </div>
{/if}

{include file='footer.tpl'}