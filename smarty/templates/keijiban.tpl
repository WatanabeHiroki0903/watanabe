{include file='header.tpl'}

<h2 class="page-header">掲示板</h2>

{*ログインしているかどうかで分岐*}
{if $login=='yes'}
    <form action="keijiban.php" method="post">
        <ul>
            <li><label>テキスト：<textarea name="text" cols=30 rows=5 maxlength=100 placeholder="投稿内容を入力"></textarea></label></li>
            <li><input type="submit" value="投稿"></li>
        </ul>
    </form>
    {if $kakikomi=='yes'}
        <p>投稿しました。</p>
    {/if}
{else}
    <p>書き込みをするにはログインしてください。</p>
{/if}

{*投稿されている内容を表示*}
{foreach from=$postList item=row}
    <hr>
    <p>ユーザー名：{$row.name}　　投稿日時：{$row.date}</p>
    <p>{$row.contents}</p>
{/foreach}


{include file='footer.tpl'}