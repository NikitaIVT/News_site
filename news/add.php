
<form name="form1" method="post" action="<? echo $PHP_SELF; ?>">
  <table width="50%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="50%">Preview</td>
      <td><input name="preview" type="text" id="preview"></td>
    </tr>
    <tr>
      <td>Date</td>
      <td><input name="date" type="text" id="date"></td>
    </tr>
    <tr>
      <td> </td>
      <td> </td>
    </tr>
    <tr>
      <td>Headline</td>
      <td><input name="headline" type="text" id="headline"></td>
    </tr>
    <tr>
      <td>News Story</td>
      <td><textarea name="story" id="story"></textarea></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
          <input name="hiddenField" type="hidden" value="add_n">
          <input name="add" type="submit" id="add" value="Submit">
        </div></td>
    </tr>
  </table>
</form>
