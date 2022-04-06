<?php

return [

	'msm-trouble' => 'Ha ocurrido un problema',
	'login' =>'Inicia Sesión con:',
	'register' => 'Registrate',
	'home' =>'Inicio',
	'book' =>'Libros',
	'about' =>' Sobre nosotros',
	'contact' =>'Contacto',
	'login' => ' Ingresar',
	'register2' => 'Registrate con tu red social',
	'title2' => 'El entrenamiento mas completo en ingeniería, arquitectura y tecnologia',
	'section-student' => 'Que dicen los estudiantes?',
	 'free' => 'Gratis',


	'footer' => [
		'title' =>'Conoce nuestras redes sociales',
		'privacy' =>'Politicas y privacidad',
		'terms' =>'Terminos y condiciones',
		'faq' =>'FAQ',
		'home' =>'Inicio',
		'about' =>'Sobre nosotros',
		'contact' =>'Contacto',
		'login' =>'Ingresar',
		'register' =>'Registrar',
		'copyright' =>'JDM Academy ',
		'copyright2' =>'Todos los derechos reservados',
	],


'enroll' => [
	'title1' =>' Inicia sesión con tu red social',
	'title2' =>'o con tu nombre y password:',
	'email' =>'Correo electronico',
	'password' =>'Contraseña',
	'close' =>'Cerrar',
	'login' =>'Iniciar Sesion',
],
	'banner' => [
		'sec1' =>'Profesores Expertos',
		'text1'=>'Nuestros profesores tienen años de experiencia y trayectoria profesional que se reflejan en los cursos impartidos',
		'sec2' =>'Cursos en linea',
		'text2'=>' Aprende bajo tu propio ritmo. Nuestros cursos siempre estaran disponibles para ti',
		'sec3' =>'Videos de calidad',
		'text3'=>'Vídeos de alta calidad, impartido con las mejores tecnicas y metodo para la enseñanza',
		'sec4' =>'Multiplataforma',
		'text4'=>'Sin importar cual sistema operativo o dispositivo uses, el contenido de nuestros cursos se adapta en la mayoria de los navegadores',	
	],

	'banner_down' => [
		'sec1' =>'Complementa tu profesion',
		'text1'=>'Ideal para complementar tu formación académica con el objetivo de conseguir mejores posiciones y oportunidades en el mercado laboral',
		'sec2' =>'Aprende en cualquier parte del mundo',
		'text2'=>'Sin importar donde estes podrás acceder a las clases de videos las 24 horas, los 7 dias de la semana',
		'sec3' =>'Material adicional de estudio',
		'text3'=>'No solo videos: Nuestros cursos tienen material descargable como guias, manuales y ejercicios',

		'sec4' =>'Certificacion',
		'text4'=>'Obtén un certificado digital al aprobar nuestros cursos',
		
	],
	'section-course' => [
		'title' =>'Elejir nuestro cursos en linea',
		'subtitle' =>'Elije algun curso que se adapte a tus necesidades',
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
			'email' => 'Email',
			'password' => 'Password',
			'role' => 'Role',
			'remember-token' => 'Remember token',
		],
	],
	
	'courses' => [
		'title' => 'Cursos en linea',
		'created_at' => 'Time',
		'fields' => [
			'teachers' => 'Teachers',
			'title' => 'Title',
			'slug' => 'Slug',
			'description' => 'Description',
			'long_description' => 'Full Text',
			'requirement' => 'Requirement',
			'price' => 'Price',
			'course-image' => 'Course image',
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
	
	'questions' => [
		'title' => 'Questions',
		'created_at' => 'Time',
		'fields' => [
			'question' => 'Question',
			'question-image' => 'Question image',
			'score' => 'Score',
		],
	],
	

'books' => [
		'title' => 'Titulo',
		'banner' => 'Descarga cualquier libro de inmediato',
		'boton' => 'Descargar Libro',
		'fields' => [
			'titulo' => 'Titulo',
			'slug' => 'Slug',
			'authors' => 'Autores',
			'description' => 'Descripcion',
			'full-text' => 'DEscripcion larga',
			'subject' => 'Tema',
			'editorial' => 'Editorial',
			'edition' => 'Edicion',
			'file' => 'Archivo',
			'picture' => 'Portada',
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
		'title2' => ' Contacto',
		'title3' => ' Contactanos',
		'button' => 'Enviar',
		'fields' => [
			'name' => 'Nombre',
			'full-name' => 'Nombre y apellido',
			'last-name' => 'Apellido',
			'email' => 'Correo electronico',
			'message' => 'Mensaje',
			'password' => 'Contraseña',
			'password2' => 'Confirmar contraseña',
			'register' => 'Registrate ahora',
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
	'global_title' => 'Quick LMS',
];