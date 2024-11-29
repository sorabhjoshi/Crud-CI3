<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['Dashboard'] = 'Welcome/dashboard';
$route['About'] = 'Welcome/about';
$route['Contact'] = 'Welcome/contact';
$route['News'] = 'Welcome/news';
$route['Blog'] = 'Welcome/blog';
$route['AddPage'] = 'Welcome/AddPage';
$route['AddPageData/(:num)'] = 'Welcome/AddPageData/$1';
$route['AddCompany'] = 'Welcome/AddCompany';
$route['AddCompanyData'] = 'Welcome/AddCompanyData';

$route['Blog/getBlogsAjax'] = 'Welcome/getBlogsAjax';


$route['Company'] = 'Welcome/Company';
$route['Pages'] = 'Welcome/Pages';
$route['Categories'] = 'Welcome/Categories';
$route['NewsCategories'] = 'Welcome/NewsCategories';

$route['Blog_website/Page/(:any)'] = 'Welcome/pageshow/$1';
$route['Login'] = 'Login/login_user';
$route['LogoutUser'] = 'Welcome/LogoutUser';
$route['Logout'] = 'Welcome/logout';
$route['Myprofile'] = 'Welcome/myprofile';
$route['Updateprofile'] = 'Welcome/updateprofile';
$route['Users'] = 'Welcome/users';
$route['EditBlog/(:num)'] = 'Edit/EditBlog/$1';
$route['Edittags/(:num)'] = 'Edit/Edittags/$1';
$route['Editnewstags/(:num)'] = 'EditNews/Editnewstags/$1';
$route['Editpages/(:num)'] = 'Edit/Editpages/$1';
$route['EditCompany/(:num)'] = 'Edit/EditCompany/$1';


$route['Updatecompany/(:num)'] = 'Edit/Updatecompany/$1';
$route['UpdateBlog/(:num)'] = 'Edit/UpdateBlog/$1';
$route['AddSEO/(:num)'] = 'Edit/UpdateSEO/$1';
$route['AddNewsSeo'] = 'EditNews/AddNewsSeo';

$route['UpdateNewsSeo/(:num)'] = 'EditNews/UpdateNewsSeo/$1';
$route['Updatecategory/(:num)'] = 'Edit/Updatecategory/$1';
$route['UpdatePageData/(:num)'] = 'Edit/UpdatePageData/$1';

$route['DeleteBlog/(:num)'] = 'Edit/DeleteBlog/$1';
$route['Deletepages/(:num)'] = 'Edit/Deletepages/$1';
$route['DeleteCompany/(:num)'] = 'Edit/DeleteCompany/$1';

$route['Deletenewstags/(:num)'] = 'EditNews/Deletenewstags/$1';
$route['Deletetags/(:num)'] = 'Edit/Deletetags/$1';
$route['EditNews/(:num)'] = 'EditNews/LoadNewsdata/$1';
$route['UpdateNews/(:num)'] = 'EditNews/UpdateNewsdata/$1';
$route['DeleteNews/(:num)'] = 'EditNews/DeleteNews/$1';
$route['EditUser/(:num)'] = 'EditUsers/LoadUserdata/$1';
$route['UpdateUser/(:num)'] = 'EditUsers/UpdateUser/$1';
$route['DeleteUser/(:num)'] = 'EditUsers/DeleteUser/$1';
$route['UserDetails/(:num)'] = 'ShowUser/ShowUserData/$1';
$route['UserDetailsEdit/(:num)'] = 'ShowUser/ShowUserDataToEdit/$1';
$route['UpdateUserDetails/(:num)'] = 'ShowUser/UpdateUserData/$1';
$route['AddNews'] = 'EditNews/AddNewsInterface';
$route['AddingNews/(:num)'] = 'EditNews/AddingNews/$1';
$route['AddBlog'] = 'Edit/AddBlog';
$route['Addcategory'] = 'Edit/Addcategory';
$route['Addcategorydata'] = 'Edit/Addcategorydata';

$route['Blog_website/AddNewsCategory'] = 'EditNews/AddNewsCategory/$1';

$route['AddBlogData/(:num)'] = 'Edit/AddBlogData/$1';
$route['Blog_website/AboutPage'] = 'Blog/AboutPage';
$route['Blog_website/Home'] = 'Blog/Home';
$route['Blog_website/NewsArticles'] = 'Blog/NewsArticles';
$route['Blog_website/Blogs'] = 'Blog/Blogs';
$route['Blog_website/ContactUS'] = 'Blog/ContactUS';
$route['Blog_website/Blog/(:any)/(:num)'] = 'Blog/blogview/$1/$2';
$route['Blog_website/News/(:any)/(:num)'] = 'Blog/newsview/$1/$2';
$route['Blog_website/Blog/(:any)/(:any)/(:num)'] = 'Blog/blogviewcat/$1/$2/$3';
$route['Blog_website/News/(:any)/(:any)/(:num)'] = 'Blog/newsviewcat/$1/$2/$3';
$route['Blog_website/Blog/(:any)'] = 'Blog/categoryview/$1';
$route['Blog_website/News/(:any)'] = 'Blog/Newscategoryview/$1';