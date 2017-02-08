create table xin_cycle(
cycle_id int auto_increment primary key comment '图片id',
cycle_address varchar(100) not null default '' comment '图片地址',
cycle_title varchar(20) not null default '' comment '图片标题',
cycle_status int not null default 1 comment '图片状态'
)default charset=utf8;

insert into xin_cycle(cycle_id, cycle_address, cycle_title, cycle_status) values('','image/dd329364034f78f0ee79d2e87a310a55b2191c9d.jpg','绝园的暴风雨--不破爱花',1);
insert into xin_cycle(cycle_id, cycle_address, cycle_title, cycle_status) values('','image/bupoaihua.jpg','绝园的暴风雨--不破爱花',1);
insert into xin_cycle(cycle_id, cycle_address, cycle_title, cycle_status) values('','image/ailuxi.jpg','妖精的尾巴--艾露莎',1);
insert into xin_cycle(cycle_id, cycle_address, cycle_title, cycle_status) values('','image/ailusha3.jpg','妖精的尾巴--艾露莎',1);
insert into xin_cycle(cycle_id, cycle_address, cycle_title, cycle_status) values('',
 'image/xizi5.jpg','黄昏少女--庚夕子',1);
insert into xin_cycle(cycle_id, cycle_address, cycle_title, cycle_status) values('',
'image/xizi.jpg','黄昏少女--庚夕子',1);

create table xin_book(
book_id int auto_increment primary key comment '书籍序号',
book_name varchar(50) not null default '' comment '书名',
book_author varchar(50) not null default '' comment '作者',
book_cover varchar(100) not null default '' comment '封面',
book_abstract varchar(500) not null default '' comment '简介',
book_content varchar(200) not null default '' comment '内容地址',
book_status int not null default 1 comment '书籍状态'
)default charset=utf8;

insert into xin_book(book_id, book_name, book_author, book_cover, book_abstract, book_content, book_status) values('', '古都', '川端康成', 'Public/image/cover/5869b2b09491f.jpg', '《古都》是日本作家川端康成的代表作。在这部小说中，川端康成运用清淡、细腻的笔触，叙述了千重子和苗子这对孪生姐妹的悲欢离合，以及人世的寂寥之感。作者把自己的关注、同情与哀叹，都给予她们，写了她们的辛酸身世和纯洁爱情，还写了她们对美好生活的向往。故事在寂静中开始，在寂静中结束，把读者带到了一个浓重的凄凉的意境，同时也反映了作者本人的虚无、厌世的思想。 作品深刻地揭示了资本主义制度下贫富悬殊以及由此造成的人情冷暖、世俗偏见等社会现状，也表现了日本人民的纯朴和善良的情感。
', 'Public/book/5869b2b0acbdd.txt', '1');

create table xin_user(
user_id int auto_increment primary key comment '用户id',
user_name varchar(20) not null default '' comment '用户账号',
user_password varchar(32) not null default '' comment '用户密码'
)default charset=utf8;

create table xin_bookmark(
bookmark_id int auto_increment primary key comment '书签id',
bookmark_uid int not null default 0 comment '书签所属用户id',
bookmark_bid int not null default 0 comment '书签所属图书id',
bookmark_page int not null default 1 comment '书签页',
bookmark_status int not null default 0 comment '0代表自动书签，1代表手动书签'
)default charset=utf8;