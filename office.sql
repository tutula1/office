-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 29, 2017 lúc 08:50 SA
-- Phiên bản máy phục vụ: 5.7.14
-- Phiên bản PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `acl`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `configs`
--

CREATE TABLE `configs` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `configs`
--

INSERT INTO `configs` (`id`, `key`, `value`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'defaultLanguage', 'vi', 0, '2017-11-23 23:20:05', '2017-11-23 23:31:07'),
(3, 'expiresAt', '0', 0, '2017-11-23 23:28:04', '2017-11-23 23:42:54'),
(4, 'defaultLanguage', 'vi', 2, '2017-11-24 00:00:39', '2017-11-24 00:22:57'),
(5, 'defaultLanguage', 'vi', 1, '2017-11-24 00:22:10', '2017-11-24 00:22:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `date_done` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `no_date_done` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `urgent` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `group` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `languages`
--

INSERT INTO `languages` (`id`, `name`, `group`, `vi`, `en`, `created_at`, `updated_at`) VALUES
(1, 'home', 'Menu', 'Trang chủ', 'Home', '2017-11-22 00:07:31', '2017-11-22 00:07:31'),
(2, 'jobs', 'Menu', 'Công việc', 'Job', '2017-11-22 01:36:08', '2017-11-23 20:52:40'),
(3, 'languages', 'Menu', 'Ngôn ngữ', 'Languages', '2017-11-22 01:45:21', '2017-11-22 01:45:21'),
(4, 'languages.create', 'Menu', 'Thêm ngôn ngữ', 'Create Language', '2017-11-22 01:45:54', '2017-11-22 01:52:03'),
(5, 'vi', 'Menu', 'Tiếng Việt', 'Vietnamese', '2017-11-22 01:46:33', '2017-11-22 01:46:33'),
(6, 'en', 'Menu', 'Tiếng Anh', 'English', '2017-11-22 01:46:49', '2017-11-22 01:46:49'),
(7, 'permissions', 'Menu', 'Quyền hạn', 'Permissions', '2017-11-22 01:58:03', '2017-11-22 01:58:03'),
(8, 'permissions.create', 'Menu', 'Thêm quyền hạn', 'Create Permission', '2017-11-22 02:06:02', '2017-11-22 02:06:02'),
(9, 'cache', 'Menu', 'Cache', 'Cache', '2017-11-22 03:36:23', '2017-11-22 03:36:23'),
(10, 'roles', 'Menu', 'Nhóm quyền', 'Roles', '2017-11-22 07:41:38', '2017-11-22 07:41:38'),
(11, 'roles.create', 'Menu', 'Thêm nhóm quyền', 'Create Role', '2017-11-22 07:42:14', '2017-11-22 07:42:14'),
(12, 'change.password', 'Menu', 'Đổi mật khẩu', 'Change Password', '2017-11-23 00:00:27', '2017-11-23 00:00:27'),
(13, 'password', 'Menu', 'Mật khẩu', 'Password', '2017-11-23 00:01:31', '2017-11-23 00:01:31'),
(14, 'confirm.password', 'Menu', 'Xác nhận mật khẩu', 'Confirm Password', '2017-11-23 00:01:54', '2017-11-23 00:01:54'),
(15, 'close', 'Menu', 'Đóng', 'Close', '2017-11-23 00:02:11', '2017-11-23 00:02:11'),
(16, 'min.password', 'Menu', 'Mật khẩu ít nhất :length ký tự', 'Mật khẩu ít nhất :length ký tự', '2017-11-23 00:03:07', '2017-11-23 00:04:34'),
(17, 'min.confirm.password', 'Menu', 'Xác nhận mật khẩu ít nhất :length ký tự', 'Xác nhận mật khẩu ít nhất :length ký tự', '2017-11-23 00:04:57', '2017-11-23 00:04:57'),
(18, 'confirm.password.is.incorrect', 'Menu', 'Xác nhận mật khẩu không chính xác', 'Xác nhận mật khẩu không chính xác', '2017-11-23 00:05:20', '2017-11-23 00:05:20'),
(19, 'confirm.delete', 'Menu', 'Bạn muốn xoá???', 'Bạn muốn xoá???', '2017-11-23 00:25:53', '2017-11-23 00:25:53'),
(20, 'change.password.success', 'Menu', 'Đổi mật khẩu thành công', 'Đổi mật khẩu thành công', '2017-11-23 00:32:10', '2017-11-23 00:32:10'),
(21, 'jobs.jobs', 'Menu', 'Công việc', 'Công việc', '2017-11-23 23:14:36', '2017-11-23 23:14:36'),
(22, 'jobs.jobs.create', 'Menu', 'Thêm công việc', 'Thêm công việc', '2017-11-23 23:14:55', '2017-11-23 23:14:55'),
(23, 'users', 'Menu', 'Người dùng', 'Người dùng', '2017-11-23 23:15:10', '2017-11-23 23:15:10'),
(24, 'users.create', 'Menu', 'Thêm người dùng', 'Thêm người dùng', '2017-11-23 23:15:28', '2017-11-23 23:15:28'),
(25, 'configs', 'Menu', 'Cấu hình', 'Cấu hình', '2017-11-23 23:15:57', '2017-11-23 23:15:57'),
(26, 'configs.create', 'Menu', 'Thêm cấu hình', 'Thêm cấu hình', '2017-11-23 23:32:49', '2017-11-23 23:32:49'),
(27, 'search', 'Menu', 'Tìm kiếm', 'Search', '2017-11-26 19:06:45', '2017-11-26 19:06:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_100000_create_password_resets_table', 1),
('2016_07_31_165918_create_permissions_table', 1),
('2016_07_31_165941_create_roles_table', 1),
('2016_07_31_170226_create_permission_role_table', 1),
('2016_07_31_170330_create_users_table', 1),
('2017_11_22_040146_create_jobs_table', 2),
('2017_11_22_044319_create_projects_table', 3),
('2017_11_22_040147_create_jobs_table', 4),
('2017_11_22_065021_create_languages_table', 5),
('2017_11_24_040525_create_options_table', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@office.vn', '482cf4b76159d91619f4bb0560dd5947f107fb119c99a7ca04f15327ac91ba1d', '2017-11-21 10:33:44'),
('quangbinh0108@gmail.com', '080824e816fc930d2f8e37165d5adc5e1dbd678105c34290ee06c1576ad818de', '2017-11-21 10:34:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `group` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `group`, `description`, `created_at`, `updated_at`) VALUES
(1, 'users.index', 'Users', 'Xem người dùng', '2017-11-20 17:00:00', '2017-11-20 17:00:00'),
(2, 'roles.index', 'Roles', 'Xem nhóm quyền', '2017-11-20 17:00:00', '2017-11-20 17:00:00'),
(3, 'permissions.index', 'Permissions', 'Xem quyền', '2017-11-20 17:00:00', '2017-11-20 17:00:00'),
(4, 'permissions.edit', 'Permissions', 'Sửa quyền', '2017-11-20 17:00:00', '2017-11-20 17:00:00'),
(5, 'permissions.destroy', 'Permissions', 'Xoá quyền', '2017-11-20 17:00:00', '2017-11-20 17:00:00'),
(6, 'permissions.create', 'Permissions', 'Thêm quyền', '2017-11-20 17:00:00', '2017-11-22 07:42:55'),
(7, 'roles.create', 'Roles', 'Thêm nhóm quyền', '2017-11-21 10:00:45', '2017-11-22 07:43:03'),
(8, 'roles.edit', 'Roles', 'Sửa nhóm quyền', '2017-11-21 10:00:58', '2017-11-21 10:00:58'),
(9, 'roles.destroy', 'Roles', 'Xoá nhóm quyền', '2017-11-21 10:01:19', '2017-11-21 10:01:19'),
(10, 'users.create', 'Users', 'Thêm người dùng', '2017-11-21 10:08:16', '2017-11-22 07:43:10'),
(11, 'users.edit', 'Users', 'Sửa người dùng', '2017-11-21 10:08:34', '2017-11-21 10:08:34'),
(12, 'users.destroy', 'Users', 'Xoá người dùng', '2017-11-21 10:09:10', '2017-11-21 10:09:10'),
(15, 'index', 'Home', 'Xem trang chủ', '2017-11-21 21:20:41', '2017-11-21 21:23:49'),
(14, 'jobs.jobs.index', 'Jobs', 'Xem công việc', '2017-11-21 21:19:28', '2017-11-23 20:41:07'),
(16, 'languages.index', 'Languages', 'Xem ngôn ngữ', '2017-11-22 00:03:54', '2017-11-22 00:03:54'),
(17, 'languages.create', 'Languages', 'Thêm ngôn ngữ', '2017-11-22 00:05:41', '2017-11-22 07:42:45'),
(18, 'languages.edit', 'Languages', 'Sửa ngôn ngữ', '2017-11-22 00:05:57', '2017-11-22 00:05:57'),
(19, 'languages.destroy', 'Languages', 'Xoá ngôn ngữ', '2017-11-22 00:06:13', '2017-11-22 00:06:13'),
(20, 'cache.index', 'Cache', 'Xem cache', '2017-11-22 02:33:20', '2017-11-22 02:33:20'),
(21, 'cache.destroy', 'Cache', 'Xoá cache', '2017-11-22 02:43:53', '2017-11-22 02:43:53'),
(22, 'jobs.jobs.create', 'Jobs', 'Thêm công việc', '2017-11-22 03:34:02', '2017-11-23 20:41:00'),
(23, 'jobs.groups.index', 'Jobs', 'Xem nhóm công việc', '2017-11-22 08:05:59', '2017-11-22 08:05:59'),
(24, 'jobs.groups.create', 'Jobs', 'Thêm nhóm công việc', '2017-11-22 08:06:24', '2017-11-22 08:06:24'),
(25, 'jobs.groups.edit', 'Jobs', 'Sửa nhóm công việc', '2017-11-22 08:06:56', '2017-11-22 08:06:56'),
(26, 'jobs.groups.destroy', 'Jobs', 'Xoá nhóm công việc', '2017-11-22 08:07:17', '2017-11-22 08:07:17'),
(27, 'configs.index', 'Configs', 'Xem cấu hình', '2017-11-23 21:14:38', '2017-11-23 21:14:38'),
(28, 'configs.create', 'Configs', 'Thêm cấu hình', '2017-11-23 21:15:01', '2017-11-23 21:15:01'),
(29, 'configs.edit', 'Configs', 'Sửa cấu hình', '2017-11-23 21:15:15', '2017-11-23 21:15:15'),
(30, 'configs.destroy', 'Configs', 'Xoá cấu hình', '2017-11-23 21:15:28', '2017-11-23 21:15:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`, `created_at`, `updated_at`) VALUES
(15, 1, '2017-11-21 21:22:06', '2017-11-21 21:22:06'),
(14, 1, '2017-11-21 21:22:06', '2017-11-21 21:22:06'),
(30, 2, '2017-11-23 21:16:01', '2017-11-23 21:16:01'),
(29, 2, '2017-11-23 21:16:00', '2017-11-23 21:16:00'),
(28, 2, '2017-11-23 21:16:00', '2017-11-23 21:16:00'),
(27, 2, '2017-11-23 21:16:00', '2017-11-23 21:16:00'),
(22, 1, '2017-11-22 03:34:24', '2017-11-22 03:34:24'),
(23, 1, '2017-11-22 09:36:45', '2017-11-22 09:36:45'),
(24, 1, '2017-11-22 09:36:45', '2017-11-22 09:36:45'),
(25, 1, '2017-11-22 09:36:45', '2017-11-22 09:36:45'),
(26, 1, '2017-11-22 09:36:45', '2017-11-22 09:36:45'),
(20, 2, '2017-11-23 20:29:20', '2017-11-23 20:29:20'),
(21, 2, '2017-11-23 20:29:20', '2017-11-23 20:29:20'),
(15, 2, '2017-11-23 20:29:20', '2017-11-23 20:29:20'),
(14, 2, '2017-11-23 20:29:20', '2017-11-23 20:29:20'),
(22, 2, '2017-11-23 20:29:20', '2017-11-23 20:29:20'),
(23, 2, '2017-11-23 20:29:20', '2017-11-23 20:29:20'),
(24, 2, '2017-11-23 20:29:20', '2017-11-23 20:29:20'),
(25, 2, '2017-11-23 20:29:20', '2017-11-23 20:29:20'),
(26, 2, '2017-11-23 20:29:20', '2017-11-23 20:29:20'),
(16, 2, '2017-11-23 20:29:20', '2017-11-23 20:29:20'),
(17, 2, '2017-11-23 20:29:20', '2017-11-23 20:29:20'),
(18, 2, '2017-11-23 20:29:20', '2017-11-23 20:29:20'),
(19, 2, '2017-11-23 20:29:20', '2017-11-23 20:29:20'),
(3, 2, '2017-11-23 20:29:20', '2017-11-23 20:29:20'),
(4, 2, '2017-11-23 20:29:20', '2017-11-23 20:29:20'),
(5, 2, '2017-11-23 20:29:20', '2017-11-23 20:29:20'),
(6, 2, '2017-11-23 20:29:20', '2017-11-23 20:29:20'),
(2, 2, '2017-11-23 20:29:20', '2017-11-23 20:29:20'),
(7, 2, '2017-11-23 20:29:20', '2017-11-23 20:29:20'),
(8, 2, '2017-11-23 20:29:20', '2017-11-23 20:29:20'),
(9, 2, '2017-11-23 20:29:20', '2017-11-23 20:29:20'),
(1, 2, '2017-11-23 20:29:20', '2017-11-23 20:29:20'),
(10, 2, '2017-11-23 20:29:20', '2017-11-23 20:29:20'),
(11, 2, '2017-11-23 20:29:20', '2017-11-23 20:29:20'),
(12, 2, '2017-11-23 20:29:20', '2017-11-23 20:29:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Default', 'Default', '2017-11-20 17:00:00', '2017-11-20 17:00:00'),
(2, 'Admin', 'Admin', '2017-11-23 20:29:20', '2017-11-23 20:29:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'tutula1', 'quangbinh0108@gmail.com', '$2y$10$1aulHeDXNfsp1E8CD/tbfuPTFPPcgUVxHnHnu/4YkHGG/saJeon4O', 'Gud553ymkSL7gaoHKBO7mE302OjK5i66qL0exTfTUBAIzgu5a5qdVPcmQWpA', '2017-11-21 09:41:02', '2017-11-24 00:22:13'),
(2, 2, 'admin', 'admin@office.vn', '$2y$10$0qdtLsiwj4xB4MRuchQuxe5EFz9dtzxOoyM1ArAO1BI0UeQpQNodi', 'YRYB8fUUiXj6UHBnrisoSyBzuNaojWMDg9iRrKvvISwuMSjiXhzoV9LWeQYo', '2017-11-23 19:28:53', '2017-11-24 00:22:05');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_user_id_foreign` (`user_id`),
  ADD KEY `jobs_project_id_foreign` (`project_id`);

--
-- Chỉ mục cho bảng `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Chỉ mục cho bảng `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `configs`
--
ALTER TABLE `configs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT cho bảng `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
