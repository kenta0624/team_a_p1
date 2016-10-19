function FormSubmit(formId){
/*
 目的：<input type='form'> の代わりに<a> を用いてsubmitする。CSSのつくりを簡単にするため。
 例　：<a href="javascript:void(0)" onclick="FormSubmit(id);">Submit</a>
 作成：2016/10/19　カタシオ
  */
    var target = document.getElementById(formId);
    target.method = 'post';
    target.submit();
}

