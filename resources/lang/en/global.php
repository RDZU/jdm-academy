<?php



return [
	
'msm-trouble' => 'There were problems with input',
'login' =>'Sign in with:',
'register' => 'Register',
'home' =>'Home',
'book' =>'Book',
'about' =>' About Us',
'contact' =>'Contact',
'login' => ' Login',
'register2' => 'Sign up with your social account',
'title2' => 'The most complete training in Engineering, Architectural and Technology',
'section-student' => 'What do you say the students?',
'free' => 'Free',


'footer' => [
	'title' =>'Get to know our social networks',
	'privacy' =>'Privacy Policy',
	'terms' =>'Terms & Conditions',
	'faq' =>'FAQ',
	'home' =>'Home',
	'about' =>'About Us',
	'contact' =>'Contact',
	'login' =>'Login',
	'register' =>'Register',
	'copyright' =>'JDM Academy',
	'copyright2' =>'all rights reserved',
],

'enroll' => [
	'title1' =>' Sign in with your social account',
	'title2' =>'or with your name and password:',
	'email' =>'Email',
	'password' =>'Password',
	'close' =>'Close',
	'login' =>'Login',
],



'banner' => [
	'sec1' =>'Experts Teacher',
	'text1' =>'Our teachers have years of experience and professional career that are reflected in the courses given',
	'sec2' =>'Courses Online',
	'text2' =>'Learn at your own pace. Our courses will always be available to you',
	'sec3' =>'Creative learning video',
	'text3' =>'Videos of the highest quality taught with the best techniques and method for teaching',
	'sec4' =>'Multiplatform',
	'text4' =>'No matter what operating system or device you use, our course content adapts to most browsers',
],

'banner_down' => [
	'sec1' =>'Complement your profession',
	'text1' =>'Ideal to complement your academic training with the aim of achieving better positions and opportunities in the job market', 
	'sec2' =>'Learning in anywhere the world',
	'text2' =>'No matter where you are, you can access the video classes 24 hours a day, 7 days a week', 
	'sec3' =>'Additional study material',
	'text3' =>'Not only videos: Our courses have downloadable material such as guides, manuals and exercises', 
	'sec4' =>'Certification',
	'text4' =>'Get a digital certificate when you pass our courses', 
],


'section-course' => [
	'title' =>'Complement your profession',
	'subtitle' =>'Learning in anywhere the world',
],




	'user-management' => [
		'title' => 'User Management',
		'created_at' => 'Time',
		'fields' => [
		],
	],
	
	'permissions' => [
		'title' => 'Permissions',
		'created_at' => 'Time',
		'fields' => [
			'title' => 'Title',
		],
	],
	
	'roles' => [
		'title' => 'Roles',
		'created_at' => 'Time',
		'fields' => [
			'title' => 'Title',
			'permission' => 'Permissions',
		],
	],
	
	'users' => [
		'title' => 'Users',
		'created_at' => 'Time',
		'fields' => [
			'name' => 'Name',
			'user_image' => 'Photo',
			'slug' => 'Slug',
			'email' => 'Email',
			'password' => 'Password',
			'description' => 'Description',
			'specialized' => 'Specialized',
			'link_twitter'=> 'Twitter',
			'link_instagram' => 'Instagram',
			'link_facebook' => 'Facebook',
			'role' => 'Role',
			'remember-token' => 'Remember token',
		],
	],
	
	'courses' => [
		'title' => 'Online courses',
		'created_at' => 'Time',
		'fields' => [
			'teachers' => 'Teachers',
			'title' => 'Title',
			'slug' => 'Slug',
			'description' => 'Description',
			'price' => 'Price',
			'course-image' => 'Course image',
			'level'=>'Level',
			'subject'=>'Subject',
			'idiom'=>'Idiom',
			'start-date' => 'Start date',
			'published' => 'Published',
		],
	],
	
	'lessons' => [
		'title' => 'Lessons',
		'created_at' => 'Time',
		'fields' => [
			'course' => 'Course',
			'title' => 'Title',
			'slug' => 'Slug',
			'lesson-image' => 'Lesson image',
			'short-text' => 'Short text',
			'full-text' => 'Full text',
			'position' => 'Position',
			'downloadable-files' => 'Downloadable files',
			'free-lesson' => 'Free lesson',
			'published' => 'Published',
		],
	],
	

'books' => [
		'title' => 'Books',
		'banner' => 'Download any book immediately',
		'boton' => 'Download Book',
		'fields' => [
			'titulo' => 'Title',
			'slug' => 'Slug',
			'authors' => 'Authors',
			'description' => 'Description',
			'full-text' => 'Full text',
			'subject' => 'Subject',
			'editorial' => 'Editorial',
			'edition' => 'Edition',
			'file' => 'File',
			'picture' => 'Picture',

		],
	],

	'questions' => [
		'title' => 'Questions',
		'created_at' => 'Time',
		'fields' => [
			'question' => 'Question',
			'question-image' => 'Question image',
			'score' => 'Score',
		],
	],
	
	'questions-options' => [
		'title' => 'Questions options',
		'created_at' => 'Time',
		'fields' => [
			'question' => 'Question',
			'option-text' => 'Option text',
			'correct' => 'Correct',
		],
	],
	
	'tests' => [
		'title' => 'Tests',
		'created_at' => 'Time',
		'fields' => [
			'course' => 'Course',
			'lesson' => 'Lesson',
			'title' => 'Title',
			'description' => 'Description',
			'questions' => 'Questions',
			'published' => 'Published',
		],
	],

	'contact' => [
		'title' => 'Comments',
		'title2' => ' Contact',
		'title3' => ' Contact',
		'button' => 'Send',
		'fields' => [
			'name' => 'Name',
			'full-name' => 'Full Name',
			'last-name' => 'Last name',
			'email' => 'Email',
			'message' => 'Message',
			'password' => 'Password',
			'password2' => 'Confirm password',
			'register' => 'Register Now',
		],
	],
	'app_create' => 'Create',
	'app_save' => 'Save',
	'app_edit' => 'Edit',
	'app_view' => 'View',
	'app_update' => 'Update',
	'app_list' => 'List',
	'app_no_entries_in_table' => 'No entries in table',
	'custom_controller_index' => 'Custom controller index.',
	'app_logout' => 'Logout',
	'app_add_new' => 'Add new',
	'app_are_you_sure' => 'Are you sure?',
	'app_back_to_list' => 'Back to list',
	'app_dashboard' => 'Dashboard',
	'app_delete' => 'Delete',
	'app_all' => 'All',
	'app_trash' => 'Trash',
	'global_title' => 'JDM Academy',
];