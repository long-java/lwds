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
            array('id' => '7','user_id' => '3','title' => 'This is test write postt','content' => 'This is test
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
          echo \'hello world\';
          
          End, good byes','content_html' => '<h1>This is test</h1><ol><li>Verry good</li></ol><p><br></p><p><img src="http://res.cloudinary.com/dm9r6ilqz/image/upload/v1632291649/vt1q2ayuiabdrsmm1ly7.png"></p><p><br></p><p><br></p><p>2. I\'m here for the skinnings</p><p><br></p><p><br></p><p><img src="http://res.cloudinary.com/dm9r6ilqz/image/upload/v1632291729/otmqxddkakmsc90cdjvn.png"></p><p><br></p><p>This is code:</p><pre class="ql-syntax" spellcheck="false">echo \'hello world\';
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
          </pre><p><br></p><p>End, good byes</p>','tag_id' => ',3','number_view' => '103','number_vote' => '1','user_voted' => ',2','user_down' => '','bookmark' => '0','created_at' => '2021-09-22 06:25:11','updated_at' => '2021-10-08 08:38:47'),
            array('id' => '11','user_id' => '2','title' => 'Bài viết của Linh đây.','content' => 'Đây là tôi nhé các bạn.
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
          
          
          Bài viết tới đây là hết. Cảm ơn.','content_html' => '<h2>Đây là tôi nhé các bạn.</h2><p>Hello everyone</p><p><br></p><p><img src="http://res.cloudinary.com/dm9r6ilqz/image/upload/v1632315229/udjywf7kjd8uebol9gzw.png"></p><p><br></p><p>Các bạn thấy có đẹp không ??</p><p>Nếu đẹp thì like bài viết nhé &lt;3</p><p><br></p><p><strong>Còn đây là code lấy toàn bộ contact của tôi: </strong></p><p><br></p><pre class="ql-syntax" spellcheck="false">&nbsp;&nbsp;&nbsp;&nbsp;function&nbsp;getAllContacts($user_id){
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
          </pre><p><br></p><p>Và tôi nhận được lỗi như thế này:</p><blockquote>Compiler Error: Network Error</blockquote><blockquote class="ql-indent-2">CORS ERROR</blockquote><blockquote class="ql-indent-1">Syntax error at line 7</blockquote><p class="ql-indent-1"><br></p><p class="ql-indent-1"><br></p><p><em><u>Bài viết tới đây là hết. Cảm ơn.</u></em></p>','tag_id' => ',1,4,11','number_view' => '179','number_vote' => '1','user_voted' => ',3','user_down' => NULL,'bookmark' => '0','created_at' => '2021-09-22 12:56:40','updated_at' => '2021-10-07 10:16:09'),
            array('id' => '13','user_id' => '2','title' => 'Một số hàm, thuộc tính hữu ích trong VueJS mà có thể bạn không biết VueJStiptricknextTick mà có thể bạn không biết','content' => 'Trong đại đa số các trường hợp, Vue khuyến khích sử dụng template để xây dựng HTML. Tuy nhiêu có một số trường hợp bạn cần dùng đến sức mạnh của JavaScript. Những lúc này bạn có thể dùng hàm render (render function), một giải pháp gần hơn với trình biên dịch, để thay thế cho template.
          Chúng ta hãy xem một ví dụ đơn giản trong đó một hàm render trở nên hữu ích. Chẳng hạn, bạn muốn tạo các tiêu đề h1, h2, h3… chứa liên kết, như sau:
          <h1>
            <a name="hello-world" href="#hello-world">
              Hello world!
            </a>
          </h1>
          Từ đoạn HTML trên, bạn quyết định tạo một giao diện component như sau:
          <anchored-heading :level="1">Hello world!</anchored-heading>','content_html' => '<p>Trong đại đa số các trường hợp, Vue khuyến khích sử dụng template để xây dựng HTML. Tuy nhiêu có một số trường hợp bạn cần dùng đến sức mạnh của JavaScript. Những lúc này bạn có thể dùng&nbsp;<span style="color: rgb(44, 62, 80);">hàm render</span>&nbsp;(render function), một giải pháp gần hơn với trình biên dịch, để thay thế cho template.</p><p>Chúng ta hãy xem một ví dụ đơn giản trong đó một hàm&nbsp;<code style="color: rgb(233, 105, 0); background-color: rgb(248, 248, 248);">render</code>&nbsp;trở nên hữu ích. Chẳng hạn, bạn muốn tạo các tiêu đề&nbsp;<code style="color: rgb(233, 105, 0); background-color: rgb(248, 248, 248);">h1</code>,&nbsp;<code style="color: rgb(233, 105, 0); background-color: rgb(248, 248, 248);">h2</code>,&nbsp;<code style="color: rgb(233, 105, 0); background-color: rgb(248, 248, 248);">h3</code>… chứa liên kết, như sau:</p><pre class="ql-syntax" spellcheck="false">&lt;h1&gt;
            &lt;a name="hello-world" href="#hello-world"&gt;
              Hello world!
            &lt;/a&gt;
          &lt;/h1&gt;
          </pre><p>Từ đoạn HTML trên, bạn quyết định tạo một giao diện component như sau:</p><pre class="ql-syntax" spellcheck="false">&lt;anchored-heading :level="1"&gt;Hello world!&lt;/anchored-heading&gt;
          </pre><p><br></p>','tag_id' => ',3','number_view' => '55','number_vote' => '0','user_voted' => '','user_down' => NULL,'bookmark' => '0','created_at' => '2021-09-23 13:00:04','updated_at' => '2021-10-08 08:38:25'),
            array('id' => '14','user_id' => '3','title' => 'Test Post','content' => 'Đây là post của Vuejs, Lol và Fun','content_html' => '<p>Đây là post của Vuejs, Lol và Fun</p>','tag_id' => ',3,4,2','number_view' => '10','number_vote' => '0','user_voted' => NULL,'user_down' => NULL,'bookmark' => '0','created_at' => '2021-09-29 15:29:14','updated_at' => '2021-10-08 08:35:57'),
            array('id' => '15','user_id' => '3','title' => 'Funnn !!!','content' => 'Funnn','content_html' => '<p>Funnn</p>','tag_id' => ',4','number_view' => '23','number_vote' => '1','user_voted' => ',2','user_down' => NULL,'bookmark' => '0','created_at' => '2021-09-30 09:48:03','updated_at' => '2021-10-08 08:39:00'),
            array('id' => '16','user_id' => '1','title' => 'This is post of Long','content' => 'Test post','content_html' => '<p>Test post</p>','tag_id' => ',4','number_view' => '1','number_vote' => '0','user_voted' => NULL,'user_down' => NULL,'bookmark' => '0','created_at' => '2021-10-05 15:27:50','updated_at' => '2021-10-06 09:21:45'),
            array('id' => '17','user_id' => '5','title' => 'Post of PingToMe','content' => 'Hi, I am PingToMe, you make me sick ???','content_html' => '<p>Hi, I am PingToMe, you make me sick ???</p>','tag_id' => ',2','number_view' => '14','number_vote' => '1','user_voted' => ',3','user_down' => NULL,'bookmark' => '0','created_at' => '2021-10-06 09:32:38','updated_at' => '2021-10-08 08:38:55'),
            array('id' => '18','user_id' => '4','title' => 'Vào đây xem gái xinh này mấy bạn..!!!','content' => 'Hello, vào đây ngắm gái đi..
          Gái xinh lắm nè mấy bạn...
          
          
          
          Đây nữa nè :v
          
          
          
          
          
          Đây nữa :v
          
          
          
          
          Ngon ko mấy men :v
          Hết nhé.','content_html' => '<h2>Hello, vào đây ngắm gái đi..</h2><p>Gái xinh lắm nè mấy bạn...</p><p><br></p><p><img src="http://res.cloudinary.com/dm9r6ilqz/image/upload/v1633680435/vs4ajr0ovvzoaam1brob.jpg"></p><p><br></p><p>Đây nữa nè :v</p><p><br></p><p><br></p><p><br></p><p><img src="http://res.cloudinary.com/dm9r6ilqz/image/upload/v1633680534/am0kn2ve9v300glbar3h.jpg"></p><p><br></p><p>Đây nữa :v</p><p><br></p><p><br></p><p><img src="http://res.cloudinary.com/dm9r6ilqz/image/upload/v1633680554/jmitaoosk3jxsyu29qni.jpg"></p><p><br></p><p>Ngon ko mấy men :v</p><p>Hết nhé.</p>','tag_id' => ',13','number_view' => '7','number_vote' => '1','user_voted' => ',3','user_down' => NULL,'bookmark' => '0','created_at' => '2021-10-08 08:09:30','updated_at' => '2021-10-08 08:36:42')
          );

          
        DB::table('posts')->insert(
            $posts
        );
    }
}
