//选中所有复选框
function checkAll(sel)
{
    sel.checked ? $("input:checkbox").prop("checked",true) : $("input:checkbox").prop("checked",false);
}
//EZ事件
var eEvent = {
    delUrl:'',
    del:function(id){
        if(confirm('确认此记录？'))
        {
            $.ajax({
                url:eEvent.delUrl,
                type:'post',
                data: {'ids':id},
                success:function(data){
                    if(data.status=='1'){
                        popMsg(data.info,1,'success',window.location);
                    }else{
                        popMsg(data.info,1,'error',0);
                    }
                    $("input:checkbox").attr("checked",false);
                },
                dataType:'json',
                contentType: "application/x-www-form-urlencoded; charset=utf-8"
            });
        }
    },
    delAll:function(){
        if(confirm('确认所选记录？'))
        {
            var selectedItems = new Array();
            $("input[name='ids[]']:checked").each(function() {
                if(parseInt($(this).val())>0)
                {
                    selectedItems.push($(this).val());
                }
            });
            if(selectedItems.length<1)
            {
                popMsg('尚未选中记录',1,'error',0);
                return false;
            }
            $.ajax({
                url:eEvent.delUrl,
                type:'post',
                data: {'ids':selectedItems},
                success:function(data){
                    if(data.status=='1'){
                        popMsg(data.info,2,'success',window.location);
                    }else{
                        popMsg(data.info,2,'error',0);
                    }
                    $("input:checkbox").attr("checked",false);
                },
                dataType:'json',
                contentType: "application/x-www-form-urlencoded; charset=utf-8"
            });
        }
    }
};
/**
 * 弹出层
 *
 */
function dialogIfram(title,url,redirect_url,width,height){
  if(!arguments[3]) width = 600;
  if(!arguments[4]) height = 500;
   art.dialog.open(url, {
      width:width,
      height:height,
      title: title,
      close:function(){
        var frame = window.parent.document.getElementById("main");
        var path = frame.getAttribute("src");
        frame.setAttribute("src", redirect_url);
      }
  });
}