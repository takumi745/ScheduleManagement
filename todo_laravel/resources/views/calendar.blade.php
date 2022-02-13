<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8' />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/main.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/main.min.js"></script>
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth'
        });
        calendar.render();
      });

    </script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  </head>
  <body>
    <div id='calendar'></div>
    <script src="{{ mix('js/ajax.js') }}"></script>

    <script>
        $(function(){
            $('.fc-daygrid-day').click(function(){
                // console.log(this.dataset.date)

                $.ajax({
                url: 'http://127.0.0.1:8000/api/calendar',
                /* 自サイトのドメインであれば、https://yotuya.com/ というURL指定も可 */
                type: 'GET',
                cache: false, //cacheを使うかどうか
                // dataType:'json', //data type scriptなどデータタイプの指定
                data: {
                    date: this.dataset.date,
                }, //アクセスするときに必要なデータを 記載
                }).done(function(result){
                /* 通信成功時 */
                // $('.result').html(result); //取得したHTMLを.resultに反映
                console.log(result);
                }).fail(function(result){
                /* 通信失敗時 */
                alert('通信失敗！');
                });
            });
        });
    </script>
  </body>
</html>
