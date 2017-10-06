@extends('layouts.admin')

@section('content') 
<!doctype html>
<html dir="ltr" lang="zh-CN">
  <head>
    <meta charset="utf-8"/>
    <title>The rolling mechanism similar to the excel, when moving the scroll bar fixed table the first row and first column</title>
    <style type="text/css">
      #table-container{width:650px;height:250px;overflow: auto;margin: 50px;border: 1px solid #DDD;}
      #table-container table{width: 100%;border-width: 0;border-collapse: collapse;}
      #table-container table td{padding: 0;border-right: 1px solid #DDD;border-bottom: 1px solid #DDD;background: #FFF;}
      #table-container .table-top td, #table-container .table-lt td, #table-container .table-left td{background: green;}

      #table-container .table-top td:last-child{border-right: 0px solid #DDD;}
      #table-container .table-right td:last-child{border-right: 0px solid #DDD;}
      #table-container .table-right tr:last-child td{border-bottom: 0px solid #DDD;}
      #table-container .table-left tr:last-child td{border-bottom: 0px solid #DDD;}
  
      #table-container td div{display: inline-block;max-width: 200px;margin:5px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;text-align: left;line-height: 24px;}
      
      #table-container .table-lt{position: fixed;z-index:3;}
      #table-container .table-top{position: fixed;overflow:hidden;z-index:2;}
      #table-container .table-left{position: fixed;overflow:hidden;z-index:2;}
      #table-container .table-right{position: relative;z-index:1;}
      #table-container .table-mask{position: relative;}
      
    </style>
    <script type="text/javascript" src="jquery-1.7.1.js"></script>
  </head>
  <body>

    <div id="table-container">
      <div class="table-lt" >
        <table >
          <tbody>
            <tr>
              <td>
                <div>
                  header-left-top
                </div>
              </td>
              <td>
                <div>
                  header-left-top
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="table-top">
        <div class="table-mask">
          <table>
            <tbody>
              <tr>
                <td>
                  <div>topTitle1</div>
                </td>
                <td>
                  <div>topTitle2</div>
                </td>
                <td>
                  <div>topTitle3</div>
                </td>
                <td>
                  <div>topTitle4</div>
                </td>
                <td>
                  <div>topTitle5</div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="table-left">
        <div class="table-mask">
          <table >
            <tbody>
              <tr>
                <td>
                  <div>leftTitle1</div>
                </td>
                <td>
                  <div>leftTitle1</div>
                </td>
              </tr>
              <tr>
                <td>
                  <div>leftTitle2</div>
                </td>
              </tr>
              <tr>
                <td>
                  <div>leftTitle3</div>
                </td>
              </tr>
              <tr>
                <td>
                  <div>leftTitle4</div>
                </td>
              </tr>
              <tr>
                <td>
                  <div>leftTitle5</div>
                </td>
              </tr>
              <tr>
                <td>
                  <div>leftTitle6</div>
                </td>
              </tr>
              <tr>
                <td>
                  <div>leftTitle7</div>
                </td>
              </tr>
              <tr>
                <td>
                  <div>leftTitle8</div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="table-right">
        <table >
          <tbody>
            <tr>
              <td>
                <div>surya</div>
              </td>
              <td>
                <div>uoifdfdfuiuiouiou</div>
              </td>
              <td>
                <div>uoiuiufdiouiou</div>
              </td>
              <td>
                <div>uoiuiufdsfsdfiouiou</div>
              </td>
              <td>
                <div>uoiuiusiouiou</div>
              </td>
            </tr>
            <tr>
              <td>
                <div>uoiuiuiouiou</div>
              </td>
              <td>
                <div>uoifdfdfuiuiouiouuoifdfdfuiuiouiouuoifdfdfuiuiouiouuoifdfdfuiuiouiou</div>
              </td>
              <td>
                <div>uoiuiufdiouiou</div>
              </td>
              <td>
                <div>uoiuiufdsfsdfiouiou</div>
              </td>
              <td>
                <div>uoiuiusiouiou</div>
              </td>
            </tr>
            <tr>
              <td>
                <div>uoiuiuiouiou</div>
              </td>
              <td>
                <div>uoifdfdfuiuiouiou</div>
              </td>
              <td>
                <div>uoiuiufdiouiou</div>
              </td>
              <td>
                <div>uoiuiufdsfsdfiouiou</div>
              </td>
              <td>
                <div>uoiuiusiouiou</div>
              </td>
            </tr>
            <tr>
              <td>
                <div>uoiuiuiouiou</div>
              </td>
              <td>
                <div>uoifdfdfuiuiouiou</div>
              </td>
              <td>
                <div>uoiuiufdiouiou</div>
              </td>
              <td>
                <div>uoiuiufdsfsdfiouiou</div>
              </td>
              <td>
                <div>uoiuiusiouiou</div>
              </td>
            </tr>
            <tr>
              <td>
                <div>uoiuiuiouiou</div>
              </td>
              <td>
                <div>uoifdfdfuiuiouiou</div>
              </td>
              <td>
                <div>uoiuiufdiouiou</div>
              </td>
              <td>
                <div>uoiuiufdsfsdfiouiou</div>
              </td>
              <td>
                <div>uoiuiusiouiou</div>
              </td>
            </tr>
            <tr>
              <td>
                <div>uoiuiuiouiou</div>
              </td>
              <td>
                <div>uoifdfdfuiuiouiou</div>
              </td>
              <td>
                <div>uoiuiufdiouiou</div>
              </td>
              <td>
                <div>uoiuiufdsfsdfiouiou</div>
              </td>
              <td>
                <div>uoiuiusiouiou</div>
              </td>
            </tr>
            <tr>
              <td>
                <div>uoiuiuiouiou</div>
              </td>
              <td>
                <div>uoifdfdfuiuiouiou</div>
              </td>
              <td>
                <div>uoiuiufdiouiou</div>
              </td>
              <td>
                <div>uoiuiufdsfsdfiouiou</div>
              </td>
              <td>
                <div>uoiuiusiouiou</div>
              </td>
            </tr>
            <tr>
              <td>
                <div>uoiuiuiouiou</div>
              </td>
              <td>
                <div>uoifdfdfuiuiouiou</div>
              </td>
              <td>
                <div>uoiuiufdiouiou</div>
              </td>
              <td>
                <div>uoiuiufdsfsdfiouiou</div>
              </td>
              <td>
                <div>uoiuiusiouiou</div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

    </div>

    <script type="text/javascript">
      $(document).ready(function(argument) {
        var container = $("#table-container"),
            ltTable = container.find(".table-lt"),
            topTable = container.find(".table-top"),
            leftTable = container.find(".table-left"),
            rightTable = container.find(".table-right"),

            containerWidth = 0,
            containerHeight =0,

            ltTableWidth = 0,
            ltTableHeight = 0,

            widthJson = {},

            timerLT = null;

        ltTableWidth = ltTable.width();
        ltTable.width(ltTableWidth);
        topTable.css("marginLeft",ltTableWidth);
        leftTable.width(ltTableWidth);
        rightTable.css("marginLeft",ltTableWidth);
        ltTableHeight = ltTable.height();
        leftTable.css("marginTop",ltTableHeight+"px");
        rightTable.css("marginTop",ltTableHeight+"px");

        containerHeight = container.height();
        containerWidth = container.width();
        topTable.width(containerWidth - ltTableWidth - (container.innerWidth() - container[0].clientWidth));
        leftTable.height(containerHeight - ltTableHeight - (container.innerHeight() - container[0].clientHeight));

        // figure out the width of each DIV in TD  --start
        function setDivWidth(obj){
          $(obj).find("div").each(function(index){
            if(!widthJson[index]){
              widthJson[index] = 0;
            }
            if(widthJson[index]<$(this).width()) {
              widthJson[index] = $(this).width();
            }
          }); 
        }
        topTable.find("tr").each(function(){
          setDivWidth(this);
        });
        rightTable.find("tr").each(function(){
          setDivWidth(this);
        });

        topTable.find("tr:first div").each(function(index){
          $(this).width(widthJson[index]);
        });
        rightTable.find("tr:first div").each(function(index){
          $(this).width(widthJson[index]);
        });
        // figure out the width of each DIV in TD  --end

        container.scroll(function(){
          var currentScrollTop = $(this).scrollTop(),
              currentScrollLeft = $(this).scrollLeft();
          topTable.find(".table-mask").css("left", -currentScrollLeft+"px");
          leftTable.find(".table-mask").css("top", -currentScrollTop+"px");

        });

        $(document).scroll(function(){
          var currentScrollTop = $(this).scrollTop(),
              currentScrollLeft = $(this).scrollLeft();
          ltTable.css("marginTop", -currentScrollTop+"px");
          ltTable.css("marginLeft", -currentScrollLeft+"px");
          topTable.css("marginTop", -currentScrollTop+"px");
          topTable.css("marginLeft", ltTableWidth - currentScrollLeft+"px");
          leftTable.css("marginTop", ltTableHeight - currentScrollTop+"px");
          leftTable.css("marginLeft", -currentScrollLeft+"px");

        });

        // for IE, when window's scrollbar is moved, keep ltTable,leftTable,topTable in the correct position
        $(window).resize(function(){
          $(document).scroll();
        });

        //reset the width of topTable and the height of leftTable when container's size is changed, if container's size is fixed, you can skip the code below.
        timerLT = setInterval(function(){
          if(containerWidth != container.width() || containerHeight != container.height()){
            topTable.width(container.width() - ltTableWidth - (container.innerWidth() - container[0].clientWidth));
            leftTable.height(container.height() - ltTableHeight - (container.innerHeight() - container[0].clientHeight));

            containerWidth = container.width();
            containerHeight = container.height();

            container.scroll();// for IE
            
          };
                   
        },0);

      });
    </script>

  </body>
</html>
@endsection