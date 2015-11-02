DROP TABLE IF EXISTS `kl_user`;
CREATE TABLE `kl_user`(
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `nickname` varchar(255) NOT NULL COMMENT '用户昵称',
    `qq` varchar(60) NOT NULL COMMENT '用户QQ',
    `email` varchar(255) NOT NULL COMMENT '用户邮箱',
    `role` char(2) NOT NULL DEFAULT '0' COMMENT '用户角色 0：普通用户；1：管理员；-1：黑名单用户',
    `ctime` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
    PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户表'; 


DROP TABLE IF EXISTS `kl_post`;
CREATE TABLE `kl_post` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `uid` int(11) NOT NULL DEFAULT '0' COMMENT '作者ID',
    `type` int(1) NOT NULL DEFAULT '0' COMMENT '0：文章；1：页面；2：教程页面',
    `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `title` varchar(255) NOT NULL COMMENT '文章标题',
    `parent` varchar(100) DEFAULT '' COMMENT '该字段只在页面为教程页面时有用 表示该页面属于哪个教程的缩略名',
    `slug` varchar(255) DEFAULT '' COMMENT '缩略名 主要用于URL',
    `content` longtext NOT NULL COMMENT '文章内容',
    `excerpt` text COMMENT '摘要',
    `status` int(1) DEFAULT '0' COMMENT '0.发布；1.草稿；2.定时待发布；-1.删除',
    `recommanded` int(1) DEFAULT '0',
    `views` int(11) NOT NULL DEFAULT '1' COMMENT '浏览量',
    `ctime` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
    PRIMARY KEY (`id`),
    KEY `uid` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=100000 DEFAULT CHARSET=utf8 COMMENT '文章、页面表';


DROP TABLE IF EXISTS `kl_taxonomy`;
CREATE TABLE `kl_taxonomy` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `pid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '父ID',
    `type` int(1) NOT NULL DEFAULT '0' COMMENT '1：分类；2：标签；3：教程名称；4：目录的章节名称',
    `name` varchar(255) NOT NULL COMMENT '名称',
    `slug` varchar(255) NOT NULl COMMENT '缩略名 主要用于URL',
    `ctime` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
    PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT '分类、标签、目录表';


DROP TABLE IF EXISTS `kl_comment`;
CREATE TABLE `kl_comment` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `user_id` int(11) NOT NULL,
    `post_id` int(11) NOT NULL,
    `pid` int(11) NOT NULL,
    `content` varchar(255) NOT NULL COMMENT '评论内容',
    `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `status` char(2) NOT NULL DEFAULT '0' COMMENT '评论状态 0：未审核；-1：已删除评论；1：审核通过',
    `ctime` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
    PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='评论表';


DROP TABLE IF EXISTS `kl_option`;
CREATE TABLE `kl_option` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `key` varchar(255) NOT NULL COMMENT '键名',
    `value` varchar(1000) NOT NULL COMMENT '值',
    `ctime` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
    PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='配置项、杂项';



DROP TABLE IF EXISTS `kl_taxonomy_map`;
CREATE TABLE `kl_taxonomy_map` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `post_id` int(11) unsigned NOT NULL,
    `type` int(1) NOT NULL DEFAULT '0' COMMENT '0：分类；1：标签；',
    `taxonomy_id` int(11) unsigned NOT NULL,
    `taxonomy_slug` varchar(255) NOT NULL COMMENT '分类、标签的缩略名',
    `taxonomy_name` varchar(255) NOT NULL COMMENT '分类、标签的名称',
    `ctime` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
    PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT '分类、标签与文章的映射表';












