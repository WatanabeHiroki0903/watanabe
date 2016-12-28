{include file='header.tpl'}

<h2 class="page-header">ログアウト</h2>

{*ログインしているかどうかで分岐*}
{if $login=='yes'}
    <form action="logout.php" method="post">
        <input type="hidden" name="logout" value="logout">
        <input type="submit" value="ログアウト">
    </form>
    {if $logout=='yes'}
        <hr>
        <p>ログアウトしました。</p>
    {/if}
{else}
    <p>すでにログアウトしています。</p>
{/if}

{include file='footer.tpl'}