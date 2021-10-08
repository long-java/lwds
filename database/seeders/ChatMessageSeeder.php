<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChatMessageSeeder extends Seeder
{
    
    public function run()
    {
        $chat_messages = array(
            array('id' => '14','chat_room_id' => '1','user_id' => '3','message' => 'Nếu bạn không sao với chỉ dòng cuối cùng của văn bản đi về phía bên của khối (trái ngược với hoàn toàn xung quanh và bên dưới nó, điều mà bạn không thể làm mà không kết thúc khối và bắt đầu một văn bản mới), đó là không thể làm nổi một khối đến một trong các góc dưới cùng của khối mẹ. Nếu bạn đặt một số nội dung trong thẻ đoạn trong một khối và muốn chuyển liên kết đến góc dưới cùng bên phải của khối, hãy đặt liên kết trong khối đoạn và đặt nó thành float: right, sau đó đặt vào thẻ div với clear : cả hai đều được đặt ngay bên dưới thẻ kết thúc của đoạn văn. Div cuối cùng là để đảm bảo rằng thẻ cha bao quanh các thẻ nổi.','created_at' => '2021-09-27 15:38:20','updated_at' => '2021-09-27 15:38:20'),
            array('id' => '15','chat_room_id' => '1','user_id' => '3','message' => 'Tôi cũng đã tìm ra giải pháp này trong một thời gian dài. Đây là những gì tôi nhận được:  align-self: flex-end;  liên kết: https://philipwalton.github.io/solved-by-flexbox/demos/vertical-centering/ Tuy nhiên, tôi không thể nhớ mình đã mở liên kết này từ đâu. Hy vọng nó giúp','created_at' => '2021-09-27 15:38:36','updated_at' => '2021-09-27 15:38:36'),
            array('id' => '17','chat_room_id' => '1','user_id' => '3','message' => 'Một bức ảnh đẹp <img class="avatar" src="https://scontent.fhan2-3.fna.fbcdn.net/v/t1.6435-9/242610693_4578929068857971_3752814994675822674_n.jpg?_nc_cat=1&ccb=1-5&_nc_sid=09cbfe&_nc_ohc=SSLL31O1J4oAX-3VMsb&_nc_ht=scontent.fhan2-3.fna&oh=03cd32007ec510759da58662f19d252b&oe=61766EDD" alt="">','created_at' => '2021-09-27 15:58:26','updated_at' => '2021-09-27 15:58:26'),
            array('id' => '18','chat_room_id' => '1','user_id' => '2','message' => 'Tại main.js ta thêm: import AOS from \'aos\' import \'aos/dist/aos.css\' Để import aos và file css của nó cho ứng dụng của mình, tiếp theo ta cần thêm vào main.js lệnh init Aos vào created để AOS được khởi tạo','created_at' => '2021-09-27 16:16:07','updated_at' => '2021-09-27 16:16:07'),
            array('id' => '20','chat_room_id' => '1','user_id' => '2','message' => '<a href="https://www.facebook.com/"> Facebook </a>','created_at' => '2021-09-27 16:17:21','updated_at' => '2021-09-27 16:17:21'),
            array('id' => '42','chat_room_id' => '1','user_id' => '3','message' => '😘😘 hihihi','created_at' => '2021-09-28 09:14:53','updated_at' => '2021-09-28 09:14:53'),
            array('id' => '47','chat_room_id' => '1','user_id' => '3','message' => 'Hãy Xem ta đây</br>
          <img src="http://res.cloudinary.com/dm9r6ilqz/image/upload/v1632920653/ewjlgdaqlgozttgavkss.jpg"/></br>
          Hãy như vậy nhé','created_at' => '2021-09-29 13:04:29','updated_at' => '2021-09-29 13:04:29'),
            array('id' => '56','chat_room_id' => '1','user_id' => '3','message' => '<iframe src="http://res.cloudinary.com/dm9r6ilqz/video/upload/v1633154977/lccktbcrtsma4zgumvzb.mp4"/></br>
          Nhạc hay.','created_at' => '2021-10-02 06:10:06','updated_at' => '2021-10-02 06:10:06'),
            array('id' => '57','chat_room_id' => '1','user_id' => '3','message' => '#test Nhạc hay quá 😍😍','created_at' => '2021-10-02 06:13:39','updated_at' => '2021-10-02 06:13:39'),
            array('id' => '60','chat_room_id' => '1','user_id' => '2','message' => '<iframe src="http://res.cloudinary.com/dm9r6ilqz/video/upload/v1633270876/pceey2xrd209hmoctwer.mp4"/>','created_at' => '2021-10-03 14:21:32','updated_at' => '2021-10-03 14:21:32'),
            array('id' => '62','chat_room_id' => '3','user_id' => '2','message' => 'Hello world hahah.. 🤣🤣','created_at' => '2021-10-06 08:09:25','updated_at' => '2021-10-06 08:09:25'),
            array('id' => '93','chat_room_id' => '3','user_id' => '5','message' => 'Quen biết gi mà hello ??','created_at' => '2021-10-06 10:30:05','updated_at' => '2021-10-06 10:30:05'),
            array('id' => '104','chat_room_id' => '3','user_id' => '3','message' => 'Quạu thế 🤣🤣','created_at' => '2021-10-06 15:55:38','updated_at' => '2021-10-06 15:55:38'),
            array('id' => '106','chat_room_id' => '1','user_id' => '4','message' => '<img src="http://res.cloudinary.com/dm9r6ilqz/image/upload/v1633680325/tlhvjhltzd7xb3rcqyxk.png"/>','created_at' => '2021-10-08 08:05:29','updated_at' => '2021-10-08 08:05:29')
          );
          

        DB::table('chat_messages') -> insert(
            $chat_messages
        );
    }
}
