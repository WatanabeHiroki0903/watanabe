{include file='header.tpl'}

<h2 class="page-header">マイページ</h2>

{*ログインしているかどうかで分岐*}
{if $login=='yes'}
    {*更新またはk削除の値がポストされている時の処理*}
    {if $edit=='update'}
        <p>更新しました。</p>
    {/if}
    {if $edit=='delete'}
        <p>削除しました。</p>
    {/if}

    {*書き込みが1つ以上あるときの処理*}
    {if $post=='yes'}
        <table>
            <tr>
                <th>投稿日時</th><th>内容</th><th></th><th></th>
            </tr>
            {foreach from=$postList item=row}
                <tr>
                    <form action="mypage.php" method="post">
                        {*投稿IDをhidden属性で送信*}
                        <input type="hidden" name="post_id" value="{$row.id}">
                        <td>{$row.date}</td>
                        <td><textarea name="text" cols=70 rows=5 maxlength=100>{$row.contents}</textarea></td>
                        <td><select name="edit">
                                <option value="update">更新</option>
                                <option value="delete">削除</option>
                            </select></td>
                        <td><input type="submit" value="決定"></td>
                    </form>
                </tr>
            {/foreach}
        </table>
    {/if}
{else}
    <p>マイページを利用するにはログインしてください</p>
{/if}

{include file='footer.tpl'}