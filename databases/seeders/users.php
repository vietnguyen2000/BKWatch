<?php

use Models\UserModel;

$user = new UserModel();
$user->insert([
  "username" => 'admin',
  "password" => password_hash('admin', null),
  "fullname" => 'Nguyễn Thị Admin',
  "address" => "",
  "email" => "admin@gmail.com",
  "phoneNumber" => "0707307749",
  "gender" => 1,
  "avatarURL" => "https://www.monteirolobato.edu.br/public/assets/admin/images/avatars/avatar1_big@2x.png",
  "role" => 1,
]);

$user->insert([
  "username" => 'viet',
  "password" => password_hash('viet', null),
  "fullname" => 'Nguyễn Hoàng Việt',
  "address" => "",
  "email" => "viet.nguyen.2000@hcmut.edu.vn",
  "phoneNumber" => "0707307749",
  "gender" => 1,
  "avatarURL" => "https://scontent.fsgn2-1.fna.fbcdn.net/v/t1.6435-9/144906357_1821825854625137_7590118312694934732_n.jpg?_nc_cat=111&ccb=1-5&_nc_sid=09cbfe&_nc_ohc=5vZVPySO5xAAX_qju0O&_nc_ht=scontent.fsgn2-1.fna&oh=f398a46e44da898271949cac32386be6&oe=61A42597",
  "role" => 0,
]);

$user->insert([
  "username" => 'linh',
  "password" => password_hash('linh', null),
  "fullname" => 'Huỳnh Phạm Phước Linh',
  "address" => "",
  "email" => "linh@hcmut.edu.vn",
  "phoneNumber" => "0707307750",
  "gender" => 1,
  "avatarURL" => "https://scontent.fsgn2-6.fna.fbcdn.net/v/t1.6435-9/127046820_2712716358939972_515830736389466496_n.jpg?_nc_cat=110&ccb=1-5&_nc_sid=09cbfe&_nc_ohc=oWwvPNbTXN8AX9phTov&_nc_oc=AQlVrTc0rsSKTkaVZNv99SR4jZYtzJ7YU3Pf1KvwkWmn49CLuVPU82kU9mKvVnPIzQY&tn=gQUv_s2qRPnJ-XTv&_nc_ht=scontent.fsgn2-6.fna&oh=cc837ccaeccdd25cc1d56085e92195df&oe=61A3F382",
  "role" => 0,
]);

$user->insert([
  "username" => 'truong',
  "password" => password_hash('truong', null),
  "fullname" => 'Đỗ Lam Trường',
  "address" => "",
  "email" => "truong@hcmut.edu.vn",
  "phoneNumber" => "0707307751",
  "gender" => 1,
  "avatarURL" => "https://scontent.fsgn2-1.fna.fbcdn.net/v/t1.6435-9/144906357_1821825854625137_7590118312694934732_n.jpg?_nc_cat=111&ccb=1-5&_nc_sid=09cbfe&_nc_ohc=5vZVPySO5xAAX_qju0O&_nc_ht=scontent.fsgn2-1.fna&oh=f398a46e44da898271949cac32386be6&oe=61A42597",
  "role" => 0,
]);

$user->insert([
  "username" => 'nam',
  "password" => password_hash('nam', null),
  "fullname" => 'Huỳnh Hoài Nam',
  "address" => "",
  "email" => "nam@hcmut.edu.vn",
  "phoneNumber" => "0707307752",
  "gender" => 1,
  "avatarURL" => "https://scontent.fsgn2-1.fna.fbcdn.net/v/t1.6435-9/144906357_1821825854625137_7590118312694934732_n.jpg?_nc_cat=111&ccb=1-5&_nc_sid=09cbfe&_nc_ohc=5vZVPySO5xAAX_qju0O&_nc_ht=scontent.fsgn2-1.fna&oh=f398a46e44da898271949cac32386be6&oe=61A42597",
  "role" => 0,
]);
