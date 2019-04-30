-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 21, 2019 at 03:58 PM
-- Server version: 5.7.24-0ubuntu0.16.04.1
-- PHP Version: 7.2.14-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nirvachan`
--

-- --------------------------------------------------------

--
-- Table structure for table `cms_apicustom`
--

CREATE TABLE `cms_apicustom` (
  `id` int(10) UNSIGNED NOT NULL,
  `permalink` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tabel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aksi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kolom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orderby` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_query_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sql_where` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `method_type` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` longtext COLLATE utf8mb4_unicode_ci,
  `responses` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_apikey`
--

CREATE TABLE `cms_apikey` (
  `id` int(10) UNSIGNED NOT NULL,
  `screetkey` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hit` int(11) DEFAULT NULL,
  `status` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_dashboard`
--

CREATE TABLE `cms_dashboard` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_cms_privileges` int(11) DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_email_queues`
--

CREATE TABLE `cms_email_queues` (
  `id` int(10) UNSIGNED NOT NULL,
  `send_at` datetime DEFAULT NULL,
  `email_recipient` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_from_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_from_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_cc_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_content` text COLLATE utf8mb4_unicode_ci,
  `email_attachments` text COLLATE utf8mb4_unicode_ci,
  `is_sent` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_email_templates`
--

CREATE TABLE `cms_email_templates` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cc_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_email_templates`
--

INSERT INTO `cms_email_templates` (`id`, `name`, `slug`, `subject`, `content`, `description`, `from_name`, `from_email`, `cc_email`, `created_at`, `updated_at`) VALUES
(1, 'Email Template Forgot Password Backend', 'forgot_password_backend', NULL, '<p>Hi,</p><p>Someone requested forgot password, here is your new password : </p><p>[password]</p><p><br></p><p>--</p><p>Regards,</p><p>Admin</p>', '[password]', 'System', 'system@crudbooster.com', NULL, '2019-01-16 07:04:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_logs`
--

CREATE TABLE `cms_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `ipaddress` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `useragent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `id_cms_users` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_logs`
--

INSERT INTO `cms_logs` (`id`, `ipaddress`, `useragent`, `url`, `description`, `details`, `id_cms_users`, `created_at`, `updated_at`) VALUES
(1, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 'http://localhost/nirvachan/public/admin/login', 'admin@crudbooster.com login with IP Address ::1', '', 1, '2019-01-16 07:06:38', NULL),
(2, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 'http://localhost/nirvachan/public/admin/test/add-save', 'Add New Data  at test', '', 1, '2019-01-16 07:23:07', NULL),
(3, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 'http://localhost/nirvachan/public/admin/test/edit-save/1', 'Update data  at test', '<table class="table table-striped"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody></tbody></table>', 1, '2019-01-16 08:29:35', NULL),
(4, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 'http://localhost/nirvachan/public/admin/test/edit-save/1', 'Update data  at test', '<table class="table table-striped"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody></tbody></table>', 1, '2019-01-16 08:29:43', NULL),
(5, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 'http://localhost/nirvachan/public/admin/login', 'admin@crudbooster.com login with IP Address ::1', '', 1, '2019-01-17 05:52:04', NULL),
(6, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 'http://localhost/nirvachan/public/admin/logout', 'admin@crudbooster.com logout', '', 1, '2019-01-17 09:02:38', NULL),
(7, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 'http://localhost/nirvachan/public/admin/login', 'admin@crudbooster.com login with IP Address ::1', '', 1, '2019-01-18 00:47:08', NULL),
(8, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 'http://localhost/nirvachan/public/admin/logout', 'admin@crudbooster.com logout', '', 1, '2019-01-18 00:52:24', NULL),
(9, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 'http://localhost/nirvachan/public/admin/login', 'admin@crudbooster.com login with IP Address ::1', '', 1, '2019-01-18 00:53:39', NULL),
(10, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 'http://localhost/nirvachan/public/admin/users/add-save', 'Add New Data Administrator at Users Management', '', 1, '2019-01-18 01:11:26', NULL),
(11, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin/login', 'dipenbroy@gmail.com login with IP Address 127.0.0.1', '', 2, '2019-01-18 01:11:40', NULL),
(12, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 'http://localhost/nirvachan/public/admin/menu_management/edit-save/2', 'Update data User Registration at Menu Management', '<table class="table table-striped"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>color</td><td></td><td>normal</td></tr><tr><td>sorting</td><td>2</td><td></td></tr></tbody></table>', 1, '2019-01-18 01:12:14', NULL),
(13, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin/logout', 'dipenbroy@gmail.com logout', '', 2, '2019-01-18 01:20:11', NULL),
(14, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin/login', 'dipenbroy@gmail.com login with IP Address 127.0.0.1', '', 2, '2019-01-18 01:20:14', NULL),
(15, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin/register_user/add-save', 'Add New Data Kaushik Mondal at User Registration', '', 2, '2019-01-18 01:21:53', NULL),
(16, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin/register_user/add-save', 'Add New Data Koushik Mondol at User Registration', '', 2, '2019-01-18 01:23:20', NULL),
(17, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 'http://localhost/nirvachan/public/admin/logout', 'admin@crudbooster.com logout', '', 1, '2019-01-18 04:12:08', NULL),
(18, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 'http://localhost/nirvachan/public/admin/login', 'admin@crudbooster.com login with IP Address ::1', '', 1, '2019-01-18 04:12:31', NULL),
(19, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 'http://localhost/nirvachan/public/admin/logout', 'admin@crudbooster.com logout', '', 1, '2019-01-18 04:15:32', NULL),
(20, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 'http://localhost/nirvachan/public/admin/login', 'admin@crudbooster.com login with IP Address ::1', '', 1, '2019-01-18 04:17:10', NULL),
(21, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 'http://localhost/nirvachan/public/admin/logout', 'admin@crudbooster.com logout', '', 1, '2019-01-18 04:47:47', NULL),
(22, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 'http://localhost/nirvachan/public/admin/login', 'admin@crudbooster.com login with IP Address ::1', '', 1, '2019-01-18 04:48:16', NULL),
(23, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 'http://localhost/nirvachan/public/admin/logout', 'admin@crudbooster.com logout', '', 1, '2019-01-18 05:25:46', NULL),
(24, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 'http://localhost/nirvachan/public/admin/login', 'admin@crudbooster.com login with IP Address ::1', '', 1, '2019-01-18 05:28:48', NULL),
(25, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin/logout', 'dipenbroy@gmail.com logout', '', 2, '2019-01-18 05:33:24', NULL),
(26, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin/login', 'dipenbroy@gmail.com login with IP Address 127.0.0.1', '', 2, '2019-01-18 05:33:28', NULL),
(27, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin/logout', 'dipenbroy@gmail.com logout', '', 2, '2019-01-18 05:33:33', NULL),
(28, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 'http://localhost/nirvachan/public/admin/users/edit-save/4', 'Update data Koushik Mondol at Users Management', '<table class="table table-striped"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>photo</td><td></td><td>uploads/1/2019-01/small_mouse_macro_515329.jpg</td></tr><tr><td>password</td><td>$2y$10$ml2ycm1w9Se4TPtAqFBkceg4ZUpa/mAeNyLMGuvPHxdtX5KYY3zz2</td><td>$2y$10$Bz7dHrZdbN0CHQxJZNRfp.B5rdI6WLiqxu0la2fczGvjMfzWhtBqS</td></tr><tr><td>status</td><td>Active</td><td></td></tr></tbody></table>', 1, '2019-01-18 05:35:42', NULL),
(29, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin/login', 'qakm@gmail.com login with IP Address 127.0.0.1', '', 4, '2019-01-18 05:35:55', NULL),
(30, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 'http://localhost/nirvachan/public/admin/menu_management/edit-save/3', 'Update data Edit Profile at Menu Management', '<table class="table table-striped"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>path</td><td>AdminProfileEditControllerGetIndex</td><td>AdminProfileEditControllerGetEdit</td></tr><tr><td>color</td><td></td><td>normal</td></tr><tr><td>sorting</td><td>3</td><td></td></tr></tbody></table>', 1, '2019-01-18 06:01:34', NULL),
(31, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 'http://localhost/nirvachan/public/admin/menu_management/edit-save/3', 'Update data Edit Profile at Menu Management', '<table class="table table-striped"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>path</td><td>AdminProfileEditControllerGetEdit</td><td>AdminProfileEditControllerGetEdit/1</td></tr><tr><td>sorting</td><td>3</td><td></td></tr></tbody></table>', 1, '2019-01-18 06:03:44', NULL),
(32, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 'http://localhost/nirvachan/public/admin/menu_management/edit-save/3', 'Update data Edit Profile at Menu Management', '<table class="table table-striped"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>path</td><td>AdminProfileEditControllerGetEdit/1</td><td>AdminProfileEditControllerGetEdit/{id}</td></tr><tr><td>sorting</td><td>3</td><td></td></tr></tbody></table>', 1, '2019-01-18 06:04:24', NULL),
(33, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 'http://localhost/nirvachan/public/admin/menu_management/edit-save/3', 'Update data Edit Profile at Menu Management', '<table class="table table-striped"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>path</td><td>AdminProfileEditControllerGetEdit/{id}</td><td>AdminProfileEditControllerGetEdit</td></tr><tr><td>sorting</td><td>3</td><td></td></tr></tbody></table>', 1, '2019-01-18 06:06:22', NULL),
(34, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 'http://localhost/nirvachan/public/admin/menu_management/edit-save/3', 'Update data Edit Profile at Menu Management', '<table class="table table-striped"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>type</td><td>Route</td><td>Module</td></tr><tr><td>path</td><td>AdminProfileEditControllerGetEdit</td><td>profile_edit</td></tr><tr><td>sorting</td><td>3</td><td></td></tr></tbody></table>', 1, '2019-01-18 07:12:55', NULL),
(35, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin/profile_edit', 'Try view the data :name at Edit Profile', '', 4, '2019-01-18 07:13:11', NULL),
(36, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 'http://localhost/nirvachan/public/admin/menu_management/edit-save/3', 'Update data Edit Profile at Menu Management', '<table class="table table-striped"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>sorting</td><td>3</td><td></td></tr></tbody></table>', 1, '2019-01-18 07:13:47', NULL),
(37, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin/profile_edit', 'Try view the data :name at Edit Profile', '', 4, '2019-01-18 07:14:01', NULL),
(38, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 'http://localhost/nirvachan/public/admin/menu_management/edit-save/3', 'Update data Edit Profile at Menu Management', '<table class="table table-striped"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>type</td><td>Module</td><td>Route</td></tr><tr><td>sorting</td><td>3</td><td></td></tr></tbody></table>', 1, '2019-01-18 07:48:02', NULL),
(39, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin/profile_edit', 'Try view the data :name at Edit Profile', '', 4, '2019-01-18 07:48:06', NULL),
(40, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 'http://localhost/nirvachan/public/admin/menu_management/edit-save/3', 'Update data Edit Profile at Menu Management', '<table class="table table-striped"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>path</td><td>profile_edit</td><td>AdminProfileEditControllerGetEdit</td></tr><tr><td>sorting</td><td>3</td><td></td></tr></tbody></table>', 1, '2019-01-18 07:53:09', NULL),
(41, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 'http://localhost/nirvachan/public/admin/menu_management/edit-save/3', 'Update data Edit Profile at Menu Management', '<table class="table table-striped"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>type</td><td>Route</td><td>Controller & Method</td></tr><tr><td>path</td><td>AdminProfileEditControllerGetEdit</td><td>AdminTestController,myFunction</td></tr><tr><td>sorting</td><td>3</td><td></td></tr></tbody></table>', 1, '2019-01-18 08:19:40', NULL),
(42, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 'http://localhost/nirvachan/public/admin/menu_management/edit-save/3', 'Update data Edit Profile at Menu Management', '<table class="table table-striped"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>sorting</td><td>3</td><td></td></tr></tbody></table>', 1, '2019-01-18 08:28:48', NULL),
(43, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 'http://localhost/nirvachan/public/admin/menu_management/edit-save/3', 'Update data Edit Profile at Menu Management', '<table class="table table-striped"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>path</td><td>AdminTestController,myFunction</td><td>Test,myFunction</td></tr><tr><td>sorting</td><td>3</td><td></td></tr></tbody></table>', 1, '2019-01-18 08:31:21', NULL),
(44, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin/logout', 'qakm@gmail.com logout', '', 4, '2019-01-18 08:31:45', NULL),
(45, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin/login', 'qakm@gmail.com login with IP Address 127.0.0.1', '', 4, '2019-01-18 08:32:01', NULL),
(46, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 'http://localhost/nirvachan/public/admin/menu_management/edit-save/3', 'Update data Edit Profile at Menu Management', '<table class="table table-striped"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>sorting</td><td>3</td><td></td></tr></tbody></table>', 1, '2019-01-18 08:32:27', NULL),
(47, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 'http://localhost/nirvachan/public/admin/menu_management/edit-save/3', 'Update data Edit Profile at Menu Management', '<table class="table table-striped"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>parent_id</td><td>0</td><td></td></tr><tr><td>is_dashboard</td><td>0</td><td>1</td></tr><tr><td>sorting</td><td>3</td><td></td></tr></tbody></table>', 1, '2019-01-18 08:32:55', NULL),
(48, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 'http://localhost/nirvachan/public/admin/menu_management/edit-save/3', 'Update data Edit Profile at Menu Management', '<table class="table table-striped"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>path</td><td>Test,myFunction</td><td>Test/myFunction</td></tr><tr><td>parent_id</td><td>0</td><td></td></tr><tr><td>sorting</td><td>3</td><td></td></tr></tbody></table>', 1, '2019-01-18 08:34:31', NULL),
(49, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 'http://localhost/nirvachan/public/admin/menu_management/edit-save/3', 'Update data Edit Profile at Menu Management', '<table class="table table-striped"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>path</td><td>Test/myFunction</td><td>Test\\myFunction</td></tr><tr><td>parent_id</td><td>0</td><td></td></tr><tr><td>sorting</td><td>3</td><td></td></tr></tbody></table>', 1, '2019-01-18 08:34:55', NULL),
(50, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 'http://localhost/nirvachan/public/admin/menu_management/edit-save/3', 'Update data Edit Profile at Menu Management', '<table class="table table-striped"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>path</td><td>Test\\myFunction</td><td>Test@myFunction</td></tr><tr><td>parent_id</td><td>0</td><td></td></tr><tr><td>sorting</td><td>3</td><td></td></tr></tbody></table>', 1, '2019-01-18 08:35:14', NULL),
(51, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin/login', 'qakm@gmail.com login with IP Address 127.0.0.1', '', 4, '2019-01-18 08:35:51', NULL),
(52, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin/login', 'qakm@gmail.com login with IP Address 127.0.0.1', '', 4, '2019-01-18 08:37:01', NULL),
(53, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 'http://localhost/nirvachan/public/admin/menu_management/edit-save/3', 'Update data Edit Profile at Menu Management', '<table class="table table-striped"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>path</td><td>Test@myFunction</td><td>Test,myFunction</td></tr><tr><td>parent_id</td><td>0</td><td></td></tr><tr><td>sorting</td><td>3</td><td></td></tr></tbody></table>', 1, '2019-01-18 09:00:31', NULL),
(54, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin/login', 'qakm@gmail.com login with IP Address 127.0.0.1', '', 4, '2019-01-18 09:00:50', NULL),
(55, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 'http://localhost/nirvachan/public/admin/menu_management/edit-save/3', 'Update data Edit Profile at Menu Management', '<table class="table table-striped"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>type</td><td>Controller & Method</td><td>Module</td></tr><tr><td>path</td><td>Test,myFunction</td><td>profile_edit</td></tr><tr><td>parent_id</td><td>0</td><td></td></tr><tr><td>sorting</td><td>3</td><td></td></tr></tbody></table>', 1, '2019-01-18 09:01:11', NULL),
(56, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:14', NULL),
(57, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:14', NULL),
(58, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:14', NULL),
(59, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:14', NULL),
(60, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:14', NULL),
(61, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:14', NULL),
(62, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:14', NULL),
(63, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:14', NULL),
(64, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:14', NULL),
(65, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:14', NULL),
(66, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:15', NULL),
(67, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:15', NULL),
(68, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:15', NULL),
(69, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:15', NULL),
(70, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:15', NULL),
(71, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:15', NULL),
(72, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:15', NULL),
(73, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:15', NULL),
(74, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:15', NULL),
(75, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:15', NULL),
(76, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:16', NULL),
(77, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:20', NULL),
(78, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:21', NULL),
(79, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:21', NULL),
(80, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:21', NULL),
(81, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:21', NULL),
(82, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:21', NULL),
(83, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:21', NULL),
(84, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:21', NULL),
(85, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:21', NULL),
(86, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:21', NULL),
(87, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:21', NULL),
(88, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:21', NULL),
(89, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:21', NULL),
(90, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:22', NULL),
(91, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:22', NULL),
(92, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:22', NULL),
(93, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:22', NULL),
(94, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:22', NULL),
(95, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:22', NULL),
(96, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:22', NULL),
(97, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:24', NULL),
(98, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:24', NULL),
(99, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:24', NULL),
(100, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:24', NULL),
(101, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:24', NULL),
(102, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:24', NULL),
(103, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:24', NULL),
(104, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:24', NULL),
(105, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:25', NULL),
(106, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:25', NULL),
(107, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:25', NULL),
(108, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:25', NULL),
(109, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:25', NULL),
(110, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:25', NULL),
(111, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:25', NULL),
(112, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:25', NULL),
(113, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:25', NULL),
(114, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:25', NULL),
(115, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:25', NULL),
(116, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:26', NULL),
(117, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin', 'Try view the data :name at ', '', 4, '2019-01-18 09:01:26', NULL),
(118, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 'http://localhost/nirvachan/public/admin/menu_management/edit-save/3', 'Update data Edit Profile at Menu Management', '<table class="table table-striped"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>type</td><td>Module</td><td>Route</td></tr><tr><td>parent_id</td><td>0</td><td></td></tr><tr><td>sorting</td><td>3</td><td></td></tr></tbody></table>', 1, '2019-01-18 09:01:36', NULL),
(119, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 'http://localhost/nirvachan/public/admin/menu_management/delete/3', 'Delete data Edit Profile at Menu Management', '', 1, '2019-01-18 09:03:43', NULL),
(120, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin/logout', 'qakm@gmail.com logout', '', 4, '2019-01-18 09:06:42', NULL),
(121, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 'http://localhost/nirvachan/public/admin/login', 'admin@crudbooster.com login with IP Address ::1', '', 1, '2019-01-21 00:23:51', NULL),
(122, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin/login', 'qakm@gmail.com login with IP Address 127.0.0.1', '', 4, '2019-01-21 00:25:16', NULL),
(123, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 'http://localhost/nirvachan/public/admin/menu_management/add-save', 'Add New Data Edit Profile at Menu Management', '', 1, '2019-01-21 00:30:22', NULL),
(124, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 'http://localhost/nirvachan/public/admin/menu_management/edit-save/3', 'Update data Edit Profile at Menu Management', '<table class="table table-striped"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>path</td><td>AdminProfileEditControllerGetProfileEdit</td><td>AdminProfileEditController1GetProfileEdit</td></tr><tr><td>sorting</td><td></td><td></td></tr></tbody></table>', 1, '2019-01-21 04:02:20', NULL),
(125, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 'http://localhost/nirvachan/public/admin/menu_management/edit-save/3', 'Update data Edit Profile at Menu Management', '<table class="table table-striped"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>path</td><td>AdminProfileEditController1GetProfileEdit</td><td>AdminProfileEditControllerGetProfileEdit</td></tr><tr><td>sorting</td><td></td><td></td></tr></tbody></table>', 1, '2019-01-21 04:07:56', NULL),
(126, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin/logout', 'qakm@gmail.com logout', '', 4, '2019-01-21 04:15:41', NULL),
(127, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin/login', 'qakm@gmail.com login with IP Address 127.0.0.1', '', 4, '2019-01-21 04:15:53', NULL),
(128, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin/logout', 'qakm@gmail.com logout', '', 4, '2019-01-21 04:31:43', NULL),
(129, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin/login', 'qakm@gmail.com login with IP Address 127.0.0.1', '', 4, '2019-01-21 04:31:46', NULL),
(130, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin/logout', 'qakm@gmail.com logout', '', 4, '2019-01-21 04:42:06', NULL),
(131, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin/login', 'qakm@gmail.com login with IP Address 127.0.0.1', '', 4, '2019-01-21 04:42:09', NULL),
(132, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0', 'http://localhost/nirvachan/public/admin/profile_edit/edit-save/1', 'Update data asdsad at Edit Profile', '<table class="table table-striped"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>date_result</td><td></td><td></td></tr><tr><td>agent_name</td><td></td><td>asdsad</td></tr><tr><td>agent_address</td><td></td><td></td></tr><tr><td>acc_no</td><td></td><td>asdad</td></tr><tr><td>bank_name</td><td></td><td></td></tr><tr><td>party_id</td><td></td><td></td></tr><tr><td>guardian_name</td><td></td><td></td></tr><tr><td>relation_wid_guardian</td><td></td><td></td></tr><tr><td>dob</td><td></td><td></td></tr><tr><td>is_active</td><td></td><td></td></tr><tr><td>language</td><td></td><td></td></tr></tbody></table>', 4, '2019-01-21 04:52:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_menus`
--

CREATE TABLE `cms_menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'url',
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_dashboard` tinyint(1) NOT NULL DEFAULT '0',
  `id_cms_privileges` int(11) DEFAULT NULL,
  `sorting` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_menus`
--

INSERT INTO `cms_menus` (`id`, `name`, `type`, `path`, `color`, `icon`, `parent_id`, `is_active`, `is_dashboard`, `id_cms_privileges`, `sorting`, `created_at`, `updated_at`) VALUES
(1, 'test', 'Route', 'AdminTestControllerGetIndex', NULL, 'fa fa-glass', 0, 1, 0, 1, 1, '2019-01-16 07:12:30', NULL),
(2, 'User Registration', 'Route', 'AdminRegisterUserControllerGetIndex', 'normal', 'fa fa-user', 0, 1, 0, 1, 2, '2019-01-18 00:56:54', '2019-01-18 01:12:14'),
(3, 'Edit Profile', 'Route', 'AdminProfileEditControllerGetProfileEdit', 'normal', 'fa fa-glass', 0, 1, 0, 1, NULL, '2019-01-21 00:30:22', '2019-01-21 04:07:56');

-- --------------------------------------------------------

--
-- Table structure for table `cms_menus_privileges`
--

CREATE TABLE `cms_menus_privileges` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_cms_menus` int(11) DEFAULT NULL,
  `id_cms_privileges` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_menus_privileges`
--

INSERT INTO `cms_menus_privileges` (`id`, `id_cms_menus`, `id_cms_privileges`) VALUES
(1, 1, 1),
(3, 2, 2),
(4, 2, 1),
(29, 3, 3),
(30, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cms_moduls`
--

CREATE TABLE `cms_moduls` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_protected` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_moduls`
--

INSERT INTO `cms_moduls` (`id`, `name`, `icon`, `path`, `table_name`, `controller`, `is_protected`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Notifications', 'fa fa-cog', 'notifications', 'cms_notifications', 'NotificationsController', 1, 1, '2019-01-16 07:04:31', NULL, NULL),
(2, 'Privileges', 'fa fa-cog', 'privileges', 'cms_privileges', 'PrivilegesController', 1, 1, '2019-01-16 07:04:31', NULL, NULL),
(3, 'Privileges Roles', 'fa fa-cog', 'privileges_roles', 'cms_privileges_roles', 'PrivilegesRolesController', 1, 1, '2019-01-16 07:04:31', NULL, NULL),
(4, 'Users Management', 'fa fa-users', 'users', 'cms_users', 'AdminCmsUsersController', 0, 1, '2019-01-16 07:04:31', NULL, NULL),
(5, 'Settings', 'fa fa-cog', 'settings', 'cms_settings', 'SettingsController', 1, 1, '2019-01-16 07:04:31', NULL, NULL),
(6, 'Module Generator', 'fa fa-database', 'module_generator', 'cms_moduls', 'ModulsController', 1, 1, '2019-01-16 07:04:31', NULL, NULL),
(7, 'Menu Management', 'fa fa-bars', 'menu_management', 'cms_menus', 'MenusController', 1, 1, '2019-01-16 07:04:31', NULL, NULL),
(8, 'Email Templates', 'fa fa-envelope-o', 'email_templates', 'cms_email_templates', 'EmailTemplatesController', 1, 1, '2019-01-16 07:04:31', NULL, NULL),
(9, 'Statistic Builder', 'fa fa-dashboard', 'statistic_builder', 'cms_statistics', 'StatisticBuilderController', 1, 1, '2019-01-16 07:04:31', NULL, NULL),
(10, 'API Generator', 'fa fa-cloud-download', 'api_generator', '', 'ApiCustomController', 1, 1, '2019-01-16 07:04:31', NULL, NULL),
(11, 'Log User Access', 'fa fa-flag-o', 'logs', 'cms_logs', 'LogsController', 1, 1, '2019-01-16 07:04:31', NULL, NULL),
(12, 'test', 'fa fa-glass', 'test', 'test', 'AdminTestController', 0, 0, '2019-01-16 07:12:30', NULL, NULL),
(13, 'User Registration', 'fa fa-user', 'register_user', 'cms_users', 'AdminRegisterUserController', 0, 0, '2019-01-18 00:56:54', NULL, NULL),
(14, 'Edit Profile', 'fa fa-edit', 'profile_edit', 'user_details', 'AdminProfileEditController', 0, 0, '2019-01-18 05:29:27', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_notifications`
--

CREATE TABLE `cms_notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_cms_users` int(11) DEFAULT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_privileges`
--

CREATE TABLE `cms_privileges` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_superadmin` tinyint(1) DEFAULT NULL,
  `theme_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_privileges`
--

INSERT INTO `cms_privileges` (`id`, `name`, `is_superadmin`, `theme_color`, `created_at`, `updated_at`) VALUES
(1, 'Super Administrator', 1, 'skin-red', '2019-01-16 07:04:31', NULL),
(2, 'Administrator', 0, 'skin-yellow-light', NULL, NULL),
(3, 'Customer', 0, 'skin-yellow-light', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_privileges_roles`
--

CREATE TABLE `cms_privileges_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `is_visible` tinyint(1) DEFAULT NULL,
  `is_create` tinyint(1) DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT NULL,
  `is_edit` tinyint(1) DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT NULL,
  `id_cms_privileges` int(11) DEFAULT NULL,
  `id_cms_moduls` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_privileges_roles`
--

INSERT INTO `cms_privileges_roles` (`id`, `is_visible`, `is_create`, `is_read`, `is_edit`, `is_delete`, `id_cms_privileges`, `id_cms_moduls`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 0, 0, 0, 1, 1, '2019-01-16 07:04:31', NULL),
(2, 1, 1, 1, 1, 1, 1, 2, '2019-01-16 07:04:31', NULL),
(3, 0, 1, 1, 1, 1, 1, 3, '2019-01-16 07:04:31', NULL),
(4, 1, 1, 1, 1, 1, 1, 4, '2019-01-16 07:04:31', NULL),
(5, 1, 1, 1, 1, 1, 1, 5, '2019-01-16 07:04:31', NULL),
(6, 1, 1, 1, 1, 1, 1, 6, '2019-01-16 07:04:31', NULL),
(7, 1, 1, 1, 1, 1, 1, 7, '2019-01-16 07:04:31', NULL),
(8, 1, 1, 1, 1, 1, 1, 8, '2019-01-16 07:04:31', NULL),
(9, 1, 1, 1, 1, 1, 1, 9, '2019-01-16 07:04:31', NULL),
(10, 1, 1, 1, 1, 1, 1, 10, '2019-01-16 07:04:31', NULL),
(11, 1, 0, 1, 0, 1, 1, 11, '2019-01-16 07:04:31', NULL),
(12, 1, 1, 1, 1, 1, 1, 12, NULL, NULL),
(15, 1, 1, 1, 1, 1, 1, 13, NULL, NULL),
(18, 1, 1, 1, 1, 1, 1, 14, NULL, NULL),
(19, 1, 1, 1, 1, 1, 2, 14, NULL, NULL),
(20, 1, 1, 1, 1, 1, 2, 12, NULL, NULL),
(21, 1, 1, 1, 1, 1, 2, 13, NULL, NULL),
(22, 1, 1, 1, 1, 1, 3, 14, NULL, NULL),
(23, 1, 1, 1, 1, 1, 3, 12, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_settings`
--

CREATE TABLE `cms_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `content_input_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dataenum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `helper` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `group_setting` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_settings`
--

INSERT INTO `cms_settings` (`id`, `name`, `content`, `content_input_type`, `dataenum`, `helper`, `created_at`, `updated_at`, `group_setting`, `label`) VALUES
(1, 'login_background_color', NULL, 'text', NULL, 'Input hexacode', '2019-01-16 07:04:31', NULL, 'Login Register Style', 'Login Background Color'),
(2, 'login_font_color', NULL, 'text', NULL, 'Input hexacode', '2019-01-16 07:04:31', NULL, 'Login Register Style', 'Login Font Color'),
(3, 'login_background_image', NULL, 'upload_image', NULL, NULL, '2019-01-16 07:04:31', NULL, 'Login Register Style', 'Login Background Image'),
(4, 'email_sender', 'support@crudbooster.com', 'text', NULL, NULL, '2019-01-16 07:04:31', NULL, 'Email Setting', 'Email Sender'),
(5, 'smtp_driver', 'mail', 'select', 'smtp,mail,sendmail', NULL, '2019-01-16 07:04:31', NULL, 'Email Setting', 'Mail Driver'),
(6, 'smtp_host', '', 'text', NULL, NULL, '2019-01-16 07:04:31', NULL, 'Email Setting', 'SMTP Host'),
(7, 'smtp_port', '25', 'text', NULL, 'default 25', '2019-01-16 07:04:31', NULL, 'Email Setting', 'SMTP Port'),
(8, 'smtp_username', '', 'text', NULL, NULL, '2019-01-16 07:04:31', NULL, 'Email Setting', 'SMTP Username'),
(9, 'smtp_password', '', 'text', NULL, NULL, '2019-01-16 07:04:31', NULL, 'Email Setting', 'SMTP Password'),
(10, 'appname', 'CRUDBooster', 'text', NULL, NULL, '2019-01-16 07:04:31', NULL, 'Application Setting', 'Application Name'),
(11, 'default_paper_size', 'Legal', 'text', NULL, 'Paper size, ex : A4, Legal, etc', '2019-01-16 07:04:31', NULL, 'Application Setting', 'Default Paper Print Size'),
(12, 'logo', '', 'upload_image', NULL, NULL, '2019-01-16 07:04:31', NULL, 'Application Setting', 'Logo'),
(13, 'favicon', '', 'upload_image', NULL, NULL, '2019-01-16 07:04:31', NULL, 'Application Setting', 'Favicon'),
(14, 'api_debug_mode', 'true', 'select', 'true,false', NULL, '2019-01-16 07:04:31', NULL, 'Application Setting', 'API Debug Mode'),
(15, 'google_api_key', '', 'text', NULL, NULL, '2019-01-16 07:04:31', NULL, 'Application Setting', 'Google API Key'),
(16, 'google_fcm_key', '', 'text', NULL, NULL, '2019-01-16 07:04:31', NULL, 'Application Setting', 'Google FCM Key');

-- --------------------------------------------------------

--
-- Table structure for table `cms_statistics`
--

CREATE TABLE `cms_statistics` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_statistic_components`
--

CREATE TABLE `cms_statistic_components` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_cms_statistics` int(11) DEFAULT NULL,
  `componentID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `component_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area_name` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sorting` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `config` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_users`
--

CREATE TABLE `cms_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_cms_privileges` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_users`
--

INSERT INTO `cms_users` (`id`, `name`, `photo`, `email`, `password`, `id_cms_privileges`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Super Admin', NULL, 'admin@crudbooster.com', '$2y$10$Dd6mDrZaAu0VTXH9Ey5usufchtQ3cjcl1C.l/apQy5dnvXnWCHEHy', 1, '2019-01-16 07:04:31', NULL, 'Active'),
(2, 'Administrator', 'uploads/1/2019-01/small_mouse_macro_515329.jpg', 'dipenbroy@gmail.com', '$2y$10$jsuTMM4eCGCG4JW3QnC8Z.HghGhgzd8yCOVY5/10LQox.LfohtNWK', 2, '2019-01-18 01:11:26', NULL, NULL),
(3, 'Kaushik Mondal', NULL, 'km@gmail.com', '$2y$10$F4PLSFWOFouvgmhWXINM0upcJ.MrygZvdwH1pWqFGQFxNSuhWvExO', 3, '2019-01-18 01:21:53', NULL, 'Active'),
(4, 'Koushik Mondol', 'uploads/1/2019-01/small_mouse_macro_515329.jpg', 'qakm@gmail.com', '$2y$10$Bz7dHrZdbN0CHQxJZNRfp.B5rdI6WLiqxu0la2fczGvjMfzWhtBqS', 3, '2019-01-18 01:23:20', '2019-01-18 05:35:42', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_08_07_145904_add_table_cms_apicustom', 2),
(4, '2016_08_07_150834_add_table_cms_dashboard', 2),
(5, '2016_08_07_151210_add_table_cms_logs', 2),
(6, '2016_08_07_151211_add_details_cms_logs', 2),
(7, '2016_08_07_152014_add_table_cms_privileges', 2),
(8, '2016_08_07_152214_add_table_cms_privileges_roles', 2),
(9, '2016_08_07_152320_add_table_cms_settings', 2),
(10, '2016_08_07_152421_add_table_cms_users', 2),
(11, '2016_08_07_154624_add_table_cms_menus_privileges', 2),
(12, '2016_08_07_154624_add_table_cms_moduls', 2),
(13, '2016_08_17_225409_add_status_cms_users', 2),
(14, '2016_08_20_125418_add_table_cms_notifications', 2),
(15, '2016_09_04_033706_add_table_cms_email_queues', 2),
(16, '2016_09_16_035347_add_group_setting', 2),
(17, '2016_09_16_045425_add_label_setting', 2),
(18, '2016_09_17_104728_create_nullable_cms_apicustom', 2),
(19, '2016_10_01_141740_add_method_type_apicustom', 2),
(20, '2016_10_01_141846_add_parameters_apicustom', 2),
(21, '2016_10_01_141934_add_responses_apicustom', 2),
(22, '2016_10_01_144826_add_table_apikey', 2),
(23, '2016_11_14_141657_create_cms_menus', 2),
(24, '2016_11_15_132350_create_cms_email_templates', 2),
(25, '2016_11_15_190410_create_cms_statistics', 2),
(26, '2016_11_17_102740_create_cms_statistic_components', 2),
(27, '2017_06_06_164501_add_deleted_at_cms_moduls', 2),
(28, '2019_01_18_095356_create_cms_user_details', 3),
(29, '2019_01_18_095356_create_user_details', 4),
(30, '2019_01_18_105314_create_cms_user_details', 5),
(31, '2019_01_18_130024_create_user_details', 6);

-- --------------------------------------------------------

--
-- Table structure for table `party_masters`
--

CREATE TABLE `party_masters` (
  `id` int(11) NOT NULL,
  `party_name` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `party_masters`
--

INSERT INTO `party_masters` (`id`, `party_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'BJP', 1, '2019-01-18 07:45:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `user_id`, `message`, `email`) VALUES
(1, 1, 'aaaaaaaaaa', 'abcd@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dipendranath BasuRoy', 'dipenbroy@gmail.com', '$2y$10$p21SNIcerbsLvbdU3HjGDOZxicd82CxIaWRiL9VgeEhSOiO2Mtlhe', 'JBTuGljRzaGAH3TtcRmpGkSDV9Df8IYAupNat495QJruLA1SfLSbc42Y1mgy', '2019-01-16 06:55:16', '2019-01-16 06:55:16');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_result` date DEFAULT NULL,
  `agent_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent_address` text COLLATE utf8mb4_unicode_ci,
  `acc_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `party_id` int(11) DEFAULT NULL,
  `guardian_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relation_wid_guardian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date DEFAULT NULL,
  `is_active` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `date_result`, `agent_name`, `agent_address`, `acc_no`, `bank_name`, `party_id`, `guardian_name`, `relation_wid_guardian`, `dob`, `is_active`, `language`, `created_at`, `updated_at`) VALUES
(1, 4, NULL, 'asdsad', NULL, 'asdad', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '2019-01-21 04:52:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cms_apicustom`
--
ALTER TABLE `cms_apicustom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_apikey`
--
ALTER TABLE `cms_apikey`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_dashboard`
--
ALTER TABLE `cms_dashboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_email_queues`
--
ALTER TABLE `cms_email_queues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_email_templates`
--
ALTER TABLE `cms_email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_logs`
--
ALTER TABLE `cms_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_menus`
--
ALTER TABLE `cms_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_menus_privileges`
--
ALTER TABLE `cms_menus_privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_moduls`
--
ALTER TABLE `cms_moduls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_notifications`
--
ALTER TABLE `cms_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_privileges`
--
ALTER TABLE `cms_privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_privileges_roles`
--
ALTER TABLE `cms_privileges_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_settings`
--
ALTER TABLE `cms_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_statistics`
--
ALTER TABLE `cms_statistics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_statistic_components`
--
ALTER TABLE `cms_statistic_components`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_users`
--
ALTER TABLE `cms_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `party_masters`
--
ALTER TABLE `party_masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cms_apicustom`
--
ALTER TABLE `cms_apicustom`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cms_apikey`
--
ALTER TABLE `cms_apikey`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cms_dashboard`
--
ALTER TABLE `cms_dashboard`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cms_email_queues`
--
ALTER TABLE `cms_email_queues`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cms_email_templates`
--
ALTER TABLE `cms_email_templates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cms_logs`
--
ALTER TABLE `cms_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;
--
-- AUTO_INCREMENT for table `cms_menus`
--
ALTER TABLE `cms_menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cms_menus_privileges`
--
ALTER TABLE `cms_menus_privileges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `cms_moduls`
--
ALTER TABLE `cms_moduls`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `cms_notifications`
--
ALTER TABLE `cms_notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cms_privileges`
--
ALTER TABLE `cms_privileges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cms_privileges_roles`
--
ALTER TABLE `cms_privileges_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `cms_settings`
--
ALTER TABLE `cms_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `cms_statistics`
--
ALTER TABLE `cms_statistics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cms_statistic_components`
--
ALTER TABLE `cms_statistic_components`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cms_users`
--
ALTER TABLE `cms_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `party_masters`
--
ALTER TABLE `party_masters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
