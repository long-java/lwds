<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $posts = array(
          array('id' => '7','user_id' => '3','title' => 'Funny and Vuejs','content' => 'Hello world, Hello everyone !!!
        Verry good
        
        
        
        
        2. I\'m here for the skinnings
        
        
        
        
        This is code:
              echo \'hello world\';
              echo \'hello world\';
              echo \'hello world\';
              echo \'hello world\';
              echo \'hello world\';
              echo \'hello world\';
              echo \'hello world\';
              echo \'hello world\';
              echo \'hello world\';
              echo \'hello world\';
              echo \'hello world\';
              echo \'hello world\';
              echo \'hello world\';
              echo \'hello world\';
              
        
        End, good byes','content_html' => '<h1>Hello world, Hello everyone !!!</h1><ol><li>Verry good</li></ol><p><br></p><p><img src="http://res.cloudinary.com/dm9r6ilqz/image/upload/v1632291649/vt1q2ayuiabdrsmm1ly7.png"></p><p><br></p><p><br></p><p>2. I\'m here for the skinnings</p><p><br></p><p><br></p><p><img src="http://res.cloudinary.com/dm9r6ilqz/image/upload/v1632291729/otmqxddkakmsc90cdjvn.png"></p><p><br></p><p>This is code:</p><pre class="ql-syntax" spellcheck="false">      echo \'hello world\';
              echo \'hello world\';
              echo \'hello world\';
              echo \'hello world\';
              echo \'hello world\';
              echo \'hello world\';
              echo \'hello world\';
              echo \'hello world\';
              echo \'hello world\';
              echo \'hello world\';
              echo \'hello world\';
              echo \'hello world\';
              echo \'hello world\';
              echo \'hello world\';
              
        </pre><p><br></p><p>End, good byes</p>','tag_id' => ',3,2','number_view' => '114','number_vote' => '1','user_voted' => ',2','user_down' => '','bookmark' => '0','created_at' => '2021-09-22 06:25:11','updated_at' => '2021-10-10 14:00:57'),
          array('id' => '11','user_id' => '2','title' => 'Bài viết của Linh Cute đây.','content' => 'Đây là tôi nhé các bạn.
        Hello everyone
        
        
        
        Các bạn thấy có đẹp không ??
        Nếu đẹp thì like bài viết nhé <3
        
        Còn đây là code lấy toàn bộ contact của tôi: 
        
              function getAllContacts($user_id){
                  if($user_id == \'my\'){
                      $user_id = Auth::user()->id;
                  }
          
                  $contacts =  DB::table(\'user_contacts\')
                                  ->join(\'users\', \'users.id\', \'=\', \'user_contacts.writer_id\')
                                  ->join(\'user_details\', \'user_details.user_id\', \'=\', \'user_contacts.writer_id\')
                                  ->where(\'user_contacts.user_id\', \'=\', $user_id)
                                  ->select(\'users.name\', \'users.user_web\',  \'user_contacts.*\' , \'user_details.avatar\')
                                  ->orderBy(\'created_at\',\'DESC\')
                                  ->get();
          
                  return $contacts;
              }
          
        
        Và tôi nhận được lỗi như thế này:
        Compiler Error: Network Error
        CORS ERROR
        Syntax error at line 7
        
        
        Bài viết tới đây là hết. Cảm ơn.','content_html' => '<h2>Đây là tôi nhé các bạn.</h2><p>Hello everyone</p><p><br></p><p><img src="http://res.cloudinary.com/dm9r6ilqz/image/upload/v1632315229/udjywf7kjd8uebol9gzw.png"></p><p><br></p><p>Các bạn thấy có đẹp không ??</p><p>Nếu đẹp thì like bài viết nhé &lt;3</p><p><br></p><p><strong>Còn đây là code lấy toàn bộ contact của tôi: </strong></p><p><br></p><pre class="ql-syntax" spellcheck="false">&nbsp;&nbsp;&nbsp;&nbsp;  function&nbsp;getAllContacts($user_id){
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if($user_id&nbsp;==&nbsp;\'my\'){
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$user_id&nbsp;=&nbsp;Auth::user()-&gt;id;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}
          
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$contacts&nbsp;=&nbsp;&nbsp;DB::table(\'user_contacts\')
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&gt;join(\'users\',&nbsp;\'users.id\',&nbsp;\'=\',&nbsp;\'user_contacts.writer_id\')
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&gt;join(\'user_details\',&nbsp;\'user_details.user_id\',&nbsp;\'=\',&nbsp;\'user_contacts.writer_id\')
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&gt;where(\'user_contacts.user_id\',&nbsp;\'=\',&nbsp;$user_id)
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&gt;select(\'users.name\',&nbsp;\'users.user_web\',&nbsp;&nbsp;\'user_contacts.*\'&nbsp;,&nbsp;\'user_details.avatar\')
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&gt;orderBy(\'created_at\',\'DESC\')
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&gt;get();
          
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;$contacts;
          &nbsp;&nbsp;&nbsp;&nbsp;}
          
        </pre><p><br></p><p>Và tôi nhận được lỗi như thế này:</p><blockquote>Compiler Error: Network Error</blockquote><blockquote class="ql-indent-2">CORS ERROR</blockquote><blockquote class="ql-indent-1">Syntax error at line 7</blockquote><p class="ql-indent-1"><br></p><p class="ql-indent-1"><br></p><p><em><u>Bài viết tới đây là hết. Cảm ơn.</u></em></p>','tag_id' => ',1','number_view' => '188','number_vote' => '1','user_voted' => ',3','user_down' => NULL,'bookmark' => '0','created_at' => '2021-09-22 12:56:40','updated_at' => '2021-10-10 13:59:42'),
          array('id' => '13','user_id' => '2','title' => 'Một số hàm, thuộc tính hữu ích trong VueJS mà có thể bạn không biết VueJStiptricknextTick mà có thể bạn không biết.','content' => 'Trong đại đa số các trường hợp, Vue khuyến khích sử dụng template để xây dựng HTML. Tuy nhiêu có một số trường hợp bạn cần dùng đến sức mạnh của JavaScript. Những lúc này bạn có thể dùng hàm render (render function), một giải pháp gần hơn với trình biên dịch, để thay thế cho template.
        Chúng ta hãy xem một ví dụ đơn giản trong đó một hàm render trở nên hữu ích. Chẳng hạn, bạn muốn tạo các tiêu đề h1, h2, h3… chứa liên kết, như sau:
              <h1>
                <a name="hello-world" href="#hello-world">
                  Hello world!
                </a>
              </h1>
              
        Từ đoạn HTML trên, bạn quyết định tạo một giao diện component như sau:
          <anchored-heading :level="1">Hello world!</anchored-heading>
        Khi bắt đầu với một component chỉ tạo thẻ tiêu đề dựa trên prop level được truyền vào, bạn sẽ nhanh chóng đi đến một kết quả trông như thế này:
          <script type="text/x-template" id="anchored-heading-template">
            <h1 v-if="level === 1">
              <slot></slot>
            </h1>
            <h2 v-else-if="level === 2">
              <slot></slot>
            </h2>
            <h3 v-else-if="level === 3">
              <slot></slot>
            </h3>
            <h4 v-else-if="level === 4">
              <slot></slot>
            </h4>
            <h5 v-else-if="level === 5">
              <slot></slot>
            </h5>
            <h6 v-else-if="level === 6">
              <slot></slot>
            </h6>
          </script>
        Rõ ràng đây không phải là một template tốt. Chẳng những nó quá rườm rà, mà ở đây chúng ta còn lặp lại <slot></slot> cho mỗi level, và lại phải thực hiện một quá trình tương tự khi thêm phần tử <a>. Vì thế, hay thử viết lại với một hàm render:
        Vue.component(\'anchored-heading\', {
          render: function (createElement) {
            return createElement(
              \'h\' + this.level,   // tên thẻ
              this.$slots.default // mảng các phần tử con
            )
          },
          props: {
            level: {
              type: Number,
              required: true
            }
          }
        })
        
        Hết nhé, bai bai...','content_html' => '<p>Trong đại đa số các trường hợp, Vue khuyến khích sử dụng template để xây dựng HTML. Tuy nhiêu có một số trường hợp bạn cần dùng đến sức mạnh của JavaScript. Những lúc này bạn có thể dùng&nbsp;<span style="color: rgb(44, 62, 80);">hàm render</span>&nbsp;(render function), một giải pháp gần hơn với trình biên dịch, để thay thế cho template.</p><p>Chúng ta hãy xem một ví dụ đơn giản trong đó một hàm&nbsp;<code style="color: rgb(233, 105, 0); background-color: rgb(248, 248, 248);">render</code>&nbsp;trở nên hữu ích. Chẳng hạn, bạn muốn tạo các tiêu đề&nbsp;<code style="color: rgb(233, 105, 0); background-color: rgb(248, 248, 248);">h1</code>,&nbsp;<code style="color: rgb(233, 105, 0); background-color: rgb(248, 248, 248);">h2</code>,&nbsp;<code style="color: rgb(233, 105, 0); background-color: rgb(248, 248, 248);">h3</code>… chứa liên kết, như sau:</p><pre class="ql-syntax" spellcheck="false">      &lt;h1&gt;
                &lt;a name="hello-world" href="#hello-world"&gt;
                  Hello world!
                &lt;/a&gt;
              &lt;/h1&gt;
              
        </pre><p>Từ đoạn HTML trên, bạn quyết định tạo một giao diện component như sau:</p><pre class="ql-syntax" spellcheck="false">  &lt;anchored-heading :level="1"&gt;Hello world!&lt;/anchored-heading&gt;
        </pre><p><span style="color: rgb(52, 73, 94);">Khi bắt đầu với một component chỉ tạo thẻ tiêu đề dựa trên prop&nbsp;</span><code style="color: rgb(233, 105, 0); background-color: rgb(248, 248, 248);">level</code><span style="color: rgb(52, 73, 94);">&nbsp;được truyền vào, bạn sẽ nhanh chóng đi đến một kết quả trông như thế này:</span></p><pre class="ql-syntax" spellcheck="false">  &lt;script type="text/x-template" id="anchored-heading-template"&gt;
            &lt;h1 v-if="level === 1"&gt;
              &lt;slot&gt;&lt;/slot&gt;
            &lt;/h1&gt;
            &lt;h2 v-else-if="level === 2"&gt;
              &lt;slot&gt;&lt;/slot&gt;
            &lt;/h2&gt;
            &lt;h3 v-else-if="level === 3"&gt;
              &lt;slot&gt;&lt;/slot&gt;
            &lt;/h3&gt;
            &lt;h4 v-else-if="level === 4"&gt;
              &lt;slot&gt;&lt;/slot&gt;
            &lt;/h4&gt;
            &lt;h5 v-else-if="level === 5"&gt;
              &lt;slot&gt;&lt;/slot&gt;
            &lt;/h5&gt;
            &lt;h6 v-else-if="level === 6"&gt;
              &lt;slot&gt;&lt;/slot&gt;
            &lt;/h6&gt;
          &lt;/script&gt;
        </pre><p><span style="color: rgb(52, 73, 94);">Rõ ràng đây không phải là một template tốt. Chẳng những nó quá rườm rà, mà ở đây chúng ta còn lặp lại&nbsp;</span><code style="color: rgb(233, 105, 0); background-color: rgb(248, 248, 248);">&lt;slot&gt;&lt;/slot&gt;</code><span style="color: rgb(52, 73, 94);">&nbsp;cho mỗi level, và lại phải thực hiện một quá trình tương tự khi thêm phần tử&nbsp;</span><code style="color: rgb(233, 105, 0); background-color: rgb(248, 248, 248);">&lt;a&gt;</code><span style="color: rgb(52, 73, 94);">. Vì thế, hay thử viết lại với một hàm&nbsp;</span><code style="color: rgb(233, 105, 0); background-color: rgb(248, 248, 248);">render</code><span style="color: rgb(52, 73, 94);">:</span></p><pre class="ql-syntax" spellcheck="false">Vue.component(\'anchored-heading\', {
          render: function (createElement) {
            return createElement(
              \'h\' + this.level,   // tên thẻ
              this.$slots.default // mảng các phần tử con
            )
          },
          props: {
            level: {
              type: Number,
              required: true
            }
          }
        })
        </pre><p><br></p><p>Hết nhé, bai bai...</p>','tag_id' => ',2','number_view' => '63','number_vote' => '0','user_voted' => '','user_down' => NULL,'bookmark' => '0','created_at' => '2021-09-23 13:00:04','updated_at' => '2021-10-10 13:59:45'),
          array('id' => '14','user_id' => '3','title' => 'Test Post','content' => 'Đây là post của Vuejs, Lol và Fun','content_html' => '<p>Đây là post của Vuejs, Lol và Fun</p>','tag_id' => ',3,4,2','number_view' => '16','number_vote' => '0','user_voted' => NULL,'user_down' => NULL,'bookmark' => '0','created_at' => '2021-09-29 15:29:14','updated_at' => '2021-10-10 13:54:11'),
          array('id' => '16','user_id' => '1','title' => 'Broadcasting trong Laravel.','content' => '#Cài đặt phía máy chủ
        Để bắt đầu sử dụng phát sóng sự kiện của Laravel, chúng ta cần thực hiện một số cấu hình trong ứng dụng Laravel cũng như cài đặt một vài gói.
        Quá trình phát sóng sự kiện được thực hiện bởi trình điều khiển phát sóng phía máy chủ phát các sự kiện Laravel của bạn để Laravel Echo (một thư viện JavaScript) có thể nhận chúng trong ứng dụng khách trình duyệt. Đừng lo lắng - chúng tôi sẽ hướng dẫn từng bước từng phần của quá trình cài đặt.
        
        #Cấu hình
        Tất cả cấu hình phát sóng sự kiện của ứng dụng của bạn được lưu trữ trong config/broadcasting.phptệp cấu hình. Laravel hỗ trợ một số trình điều khiển quảng bá: Kênh Pusher , Redis và logtrình điều khiển để phát triển cục bộ và gỡ lỗi. Ngoài ra, một nulltrình điều khiển được bao gồm cho phép bạn tắt hoàn toàn tính năng phát sóng trong quá trình thử nghiệm. Một ví dụ cấu hình được bao gồm cho mỗi trình điều khiển này trong config/broadcasting.phptệp cấu hình.
        
        #Kênh đẩy
        Cài đặt SDK PHP của Pusher Channels bằng cách sử dụng trình quản lý gói Composer:
          composer require pusher/pusher-php-server
        Cấu hình thông tin đăng nhập Kênh Pusher của mình trong config/broadcasting.phptệp cấu hình
          PUSHER_APP_ID=your-pusher-app-id
          PUSHER_APP_KEY=your-pusher-key
          PUSHER_APP_SECRET=your-pusher-secret
          PUSHER_APP_CLUSTER=mt1
        Các config/broadcasting.phpcủa tập tin pushercấu hình cũng cho phép bạn chỉ định thêm optionsđược hỗ trợ bởi kênh, chẳng hạn như cluster.
          BROATCASR_DRIVER = pusher
        #Một số lỗi hay gặp
        Lỗi
        app.js:17392 Error: Network Error
        at createError (app.js:14404)
        at XMLHttpRequest.handleError (app.js:13851)
        Mô tả:
          Access to XMLHttpRequest at \'https://api.cloudinary.com/v1_1/dm9r6ilqz/upload\' from origin
            http://localhost:8000\' has been blocked by CORS policy: Request header field access-control- 
            allow-origin is not allowed by Access-Control-Allow-Headers in preflight response.
        
        Bài viết đến đây kết thúc.','content_html' => '<h2>#Cài đặt phía máy chủ</h2><p>Để bắt đầu sử dụng phát sóng sự kiện của Laravel, chúng ta cần thực hiện một số cấu hình trong ứng dụng Laravel cũng như cài đặt một vài gói.</p><p>Quá trình phát sóng sự kiện được thực hiện bởi trình điều khiển phát sóng phía máy chủ phát các sự kiện Laravel của bạn để Laravel Echo (một thư viện JavaScript) có thể nhận chúng trong ứng dụng khách trình duyệt.&nbsp;Đừng lo lắng - chúng tôi sẽ hướng dẫn từng bước từng phần của quá trình cài đặt.</p><h2><br></h2><h2>#Cấu hình</h2><p>Tất cả cấu hình phát sóng sự kiện của ứng dụng của bạn được lưu trữ trong&nbsp;<code style="color: rgb(202, 71, 63); background-color: rgb(251, 251, 253);">config/broadcasting.php</code>tệp cấu hình.&nbsp;Laravel hỗ trợ một số trình điều khiển quảng bá:&nbsp;<a href="https://pusher.com/channels" rel="noopener noreferrer" target="_blank" style="color: rgb(255, 45, 32);">Kênh Pusher</a>&nbsp;,&nbsp;<a href="https://laravel.com/docs/8.x/redis" rel="noopener noreferrer" target="_blank" style="color: rgb(255, 45, 32);">Redis</a>&nbsp;và&nbsp;<code style="color: rgb(202, 71, 63); background-color: rgb(251, 251, 253);">log</code>trình điều khiển để phát triển cục bộ và gỡ lỗi.&nbsp;Ngoài ra, một&nbsp;<code style="color: rgb(202, 71, 63); background-color: rgb(251, 251, 253);">null</code>trình điều khiển được bao gồm cho phép bạn tắt hoàn toàn tính năng phát sóng trong quá trình thử nghiệm.&nbsp;Một ví dụ cấu hình được bao gồm cho mỗi trình điều khiển này trong&nbsp;<code style="color: rgb(202, 71, 63); background-color: rgb(251, 251, 253);">config/broadcasting.php</code>tệp cấu hình.</p><p><br></p><h2>#Kênh đẩy</h2><p><span style="color: rgb(43, 46, 56);">Cài đặt SDK PHP của Pusher Channels bằng cách sử dụng trình quản lý gói Composer:</span></p><pre class="ql-syntax" spellcheck="false">  composer require pusher/pusher-php-server
        </pre><p>Cấu hình thông tin đăng nhập Kênh Pusher của mình trong&nbsp;<code style="color: rgb(202, 71, 63); background-color: rgb(251, 251, 253);">config/broadcasting.php</code>tệp cấu hình</p><pre class="ql-syntax" spellcheck="false">  PUSHER_APP_ID=your-pusher-app-id
          PUSHER_APP_KEY=your-pusher-key
          PUSHER_APP_SECRET=your-pusher-secret
          PUSHER_APP_CLUSTER=mt1
        </pre><p>Các&nbsp;<code style="color: rgb(202, 71, 63); background-color: rgb(251, 251, 253);">config/broadcasting.php</code>của tập tin&nbsp;<code style="color: rgb(202, 71, 63); background-color: rgb(251, 251, 253);">pusher</code>cấu hình cũng cho phép bạn chỉ định thêm&nbsp;<code style="color: rgb(202, 71, 63); background-color: rgb(251, 251, 253);">options</code>được hỗ trợ bởi kênh, chẳng hạn như cluster.</p><pre class="ql-syntax" spellcheck="false">  BROATCASR_DRIVER = pusher
        </pre><h2>#Một số lỗi hay gặp</h2><p>Lỗi</p><blockquote>app.js:17392 Error: Network Error</blockquote><blockquote>at createError (app.js:14404)</blockquote><blockquote>at XMLHttpRequest.handleError (app.js:13851)</blockquote><p>Mô tả:</p><pre class="ql-syntax" spellcheck="false">  Access to XMLHttpRequest at \'https://api.cloudinary.com/v1_1/dm9r6ilqz/upload\' from origin
            http://localhost:8000\' has been blocked by CORS policy: Request header field access-control- 
            allow-origin is not allowed by Access-Control-Allow-Headers in preflight response.
        </pre><p><br></p><p>Bài viết đến đây kết thúc.</p>','tag_id' => ',1','number_view' => '10','number_vote' => '0','user_voted' => NULL,'user_down' => NULL,'bookmark' => '0','created_at' => '2021-10-05 15:27:50','updated_at' => '2021-10-10 13:51:48'),
          array('id' => '18','user_id' => '4','title' => 'Vào đây xem gái xinh này mấy bạn..!!!','content' => 'Hello, vào đây ngắm gái đi..
                  Gái xinh lắm nè mấy bạn...
                  
                  
                  
                  Đây nữa nè :v
                  
                  
                  
                  
                  
                  Đây nữa :v
                  
                  
                  
                  
                  Ngon ko mấy men :v
                  Hết nhé.','content_html' => '<h2>Hello, vào đây ngắm gái đi..</h2><p>Gái xinh lắm nè mấy bạn...</p><p><br></p><p><img src="http://res.cloudinary.com/dm9r6ilqz/image/upload/v1633680435/vs4ajr0ovvzoaam1brob.jpg"></p><p><br></p><p>Đây nữa nè :v</p><p><br></p><p><br></p><p><br></p><p><img src="http://res.cloudinary.com/dm9r6ilqz/image/upload/v1633680534/am0kn2ve9v300glbar3h.jpg"></p><p><br></p><p>Đây nữa :v</p><p><br></p><p><br></p><p><img src="http://res.cloudinary.com/dm9r6ilqz/image/upload/v1633680554/jmitaoosk3jxsyu29qni.jpg"></p><p><br></p><p>Ngon ko mấy men :v</p><p>Hết nhé.</p>','tag_id' => ',13','number_view' => '27','number_vote' => '1','user_voted' => ',3','user_down' => NULL,'bookmark' => '0','created_at' => '2021-10-08 08:09:30','updated_at' => '2021-10-10 13:44:06'),
          array('id' => '19','user_id' => '5','title' => 'Post này toàn gái xinh nhé..','content' => 'Bộ sưu tập những hình ảnh gái xinh đẹp và dễ thương nhất hiện nay...
        Bộ sưu tập những hình ảnh gái xinh đẹp và dễ thương nhất hiện nay. Đây là những hình ảnh về các cô gái xinh đẹp, cute và thật đáng yêu ai nhìn cũng không muốn rời mắt đi nơi khác. Mời bạn cùng xem và tải về hình ảnh gái xinh miễn phí.
        Bắt đầu nào.. 😅😅
        
        
        
        
        Tiếp tục nào :v
        
        
        
        Xinh không quý vị, vẫn còn nhé =))
        
        
        
        Tiếp nè...
        
        
        
        
        
        Hết nhé, ko có nữa đâu :v :v','content_html' => '<h2><span style="color: rgb(53, 1, 24);">Bộ sưu tập những hình ảnh&nbsp;gái xinh&nbsp;đẹp và dễ thương nhất hiện nay...</span></h2><p><span style="color: rgb(53, 1, 24);">Bộ sưu tập những hình ảnh&nbsp;gái xinh đẹp và dễ thương nhất hiện nay. Đây là những hình ảnh về các cô gái xinh đẹp, cute và thật đáng yêu ai nhìn cũng không muốn rời mắt đi nơi khác. Mời bạn cùng xem và tải về hình ảnh gái xinh miễn phí.</span></p><p>Bắt đầu nào.. 😅😅</p><p><br></p><p><br></p><p><br></p><p><img src="http://res.cloudinary.com/dm9r6ilqz/image/upload/v1633872401/Lazy/ohd5al615vis12hp6pm6.jpg"></p><p>Tiếp tục nào :v</p><p><br></p><p><br></p><p><img src="http://res.cloudinary.com/dm9r6ilqz/image/upload/v1633872424/Lazy/cj6k6o4radl3f5xccdka.jpg"></p><p>Xinh không quý vị, vẫn còn nhé =))</p><p><br></p><p><br></p><p><img src="http://res.cloudinary.com/dm9r6ilqz/image/upload/v1633872448/Lazy/dnjcewdujkma3wsigfpf.jpg"></p><p>Tiếp nè...</p><p><br></p><p><br></p><p><img src="http://res.cloudinary.com/dm9r6ilqz/image/upload/v1633872484/Lazy/imbiqcamrwpa67ahrp3j.jpg"></p><p><br></p><p><br></p><p>Hết nhé, ko có nữa đâu :v :v</p>','tag_id' => ',13,4','number_view' => '5','number_vote' => '0','user_voted' => NULL,'user_down' => NULL,'bookmark' => '0','created_at' => '2021-10-10 13:28:44','updated_at' => '2021-10-10 13:55:13')
        );
        
          
        DB::table('posts')->insert(
            $posts
        );
    }
}
