[1mdiff --git a/app/Resources/admin/coffee/main.coffee b/app/Resources/admin/coffee/main.coffee[m
[1mindex ded1496..4972592 100644[m
[1m--- a/app/Resources/admin/coffee/main.coffee[m
[1m+++ b/app/Resources/admin/coffee/main.coffee[m
[36m@@ -3,5 +3,12 @@[m [mconfrimDelete = ->[m
     r = confirm("Вы уверены?")[m
     return false if not r[m
 [m
[32m+[m[32minjectEditor = ->[m
[32m+[m[32m  $('.editor').summernote[m
[32m+[m[32m    height: 300[m
[32m+[m[32m    focus: true[m
[32m+[m
[32m+[m
 $ ->[m
[31m-  do confrimDelete[m
\ No newline at end of file[m
[32m+[m[32m  do confrimDelete[m
[32m+[m[32m  do injectEditor[m
\ No newline at end of file[m
[1mdiff --git a/app/Resources/admin/sass/main.sass b/app/Resources/admin/sass/main.sass[m
[1mindex 84597f9..08bdbf3 100644[m
[1m--- a/app/Resources/admin/sass/main.sass[m
[1m+++ b/app/Resources/admin/sass/main.sass[m
[36m@@ -10,4 +10,75 @@[m
     padding-top: 5px[m
 [m
 .inline-block[m
[31m-  display: inline-block[m
\ No newline at end of file[m
[32m+[m[32m  display: inline-block[m
[32m+[m
[32m+[m[32m.note-editor[m
[32m+[m[32m  .btn-default[m
[32m+[m[32m    color: #333[m
[32m+[m[32m    background-color: #fff[m
[32m+[m[32m    border-color: #ccc[m
[32m+[m[32m    &:hover, &:focus, &:active, &.active[m
[32m+[m[32m      color: #333[m
[32m+[m[32m      background-color: #e6e6e6[m
[32m+[m[32m      border-color: #adadad[m
[32m+[m
[32m+[m[32m  .open > .dropdown-toggle.btn-default[m
[32m+[m[32m    color: #333[m
[32m+[m[32m    background-color: #e6e6e6[m
[32m+[m[32m    border-color: #adadad[m
[32m+[m
[32m+[m[32m  .btn-default[m
[32m+[m[32m    &:active, &.active[m
[32m+[m[32m      background-image: none[m
[32m+[m
[32m+[m[32m  .open > .dropdown-toggle.btn-default[m
[32m+[m[32m    background-image: none[m
[32m+[m
[32m+[m[32m  .btn-default[m
[32m+[m[32m    &.disabled, &[disabled][m
[32m+[m[32m      background-color: #fff[m
[32m+[m[32m      border-color: #ccc[m
[32m+[m
[32m+[m[32m  fieldset[disabled] .btn-default[m
[32m+[m[32m    background-color: #fff[m
[32m+[m[32m    border-color: #ccc[m
[32m+[m
[32m+[m[32m  .btn-default[m
[32m+[m[32m    &.disabled:hover, &[disabled]:hover[m
[32m+[m[32m      background-color: #fff[m
[32m+[m[32m      border-color: #ccc[m
[32m+[m
[32m+[m[32m  fieldset[disabled] .btn-default:hover[m
[32m+[m[32m    background-color: #fff[m
[32m+[m[32m    border-color: #ccc[m
[32m+[m
[32m+[m[32m  .btn-default[m
[32m+[m[32m    &.disabled:focus, &[disabled]:focus[m
[32m+[m[32m      background-color: #fff[m
[32m+[m[32m      border-color: #ccc[m
[32m+[m
[32m+[m[32m  fieldset[disabled] .btn-default:focus[m
[32m+[m[32m    background-color: #fff[m
[32m+[m[32m    border-color: #ccc[m
[32m+[m
[32m+[m[32m  .btn-default[m
[32m+[m[32m    &.disabled:active, &[disabled]:active[m
[32m+[m[32m      background-color: #fff[m
[32m+[m[32m      border-color: #ccc[m
[32m+[m
[32m+[m[32m  fieldset[disabled] .btn-default:active[m
[32m+[m[32m    background-color: #fff[m
[32m+[m[32m    border-color: #ccc[m
[32m+[m
[32m+[m[32m  .btn-default[m
[32m+[m[32m    &.disabled.active, &[disabled].active[m
[32m+[m[32m      background-color: #fff[m
[32m+[m[32m      border-color: #ccc[m
[32m+[m
[32m+[m[32m  fieldset[disabled] .btn-default.active[m
[32m+[m[32m    background-color: #fff[m
[32m+[m[32m    border-color: #ccc[m
[32m+[m
[32m+[m[32m  .btn-default .badge[m
[32m+[m[32m    color: #fff[m
[32m+[m[32m    background-color: #333[m
\ No newline at end of file[m
[1mdiff --git a/app/Resources/admin/views/admin.html.twig b/app/Resources/admin/views/admin.html.twig[m
[1mindex cbcd331..8a56188 100644[m
[1m--- a/app/Resources/admin/views/admin.html.twig[m
[1m+++ b/app/Resources/admin/views/admin.html.twig[m
[36m@@ -7,6 +7,8 @@[m
     <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}"/>[m
     <link rel="stylesheet" href="/vendor/bootstrap/dist/css/bootstrap.min.css"/>[m
     <link rel="stylesheet" href="/vendor/bootswatch/flatly/bootstrap.min.css"/>[m
[32m+[m[32m    <link rel="stylesheet" href="/vendor/font-awesome/css/font-awesome.min.css"/>[m
[32m+[m[32m    <link rel="stylesheet" href="/vendor/summernote/dist/summernote.css"/>[m
     <link rel="stylesheet" href="/admin/css/main.css"/>[m
 </head>[m
 <body class="body">[m
[36m@@ -42,6 +44,7 @@[m
 {% block javascripts %}[m
     <script src="/vendor/jquery/dist/jquery.min.js"></script>[m
     <script src="/vendor/bootstrap/dist/js/bootstrap.min.js"></script>[m
[32m+[m[32m    <script src="/vendor/summernote/dist/summernote.min.js"></script>[m
     <script src="/admin/js/main.js"></script>[m
 {% endblock %}[m
 </body>[m
[1mdiff --git a/app/Resources/translations/messages.ru.yml b/app/Resources/translations/messages.ru.yml[m
[1mindex e69de29..de74453 100644[m
[1m--- a/app/Resources/translations/messages.ru.yml[m
[1m+++ b/app/Resources/translations/messages.ru.yml[m
[36m@@ -0,0 +1 @@[m
[32m+[m[32mName: Название[m
\ No newline at end of file[m
[1mdiff --git a/bower.json b/bower.json[m
[1mindex cfbb4eb..0972808 100644[m
[1m--- a/bower.json[m
[1m+++ b/bower.json[m
[36m@@ -14,6 +14,11 @@[m
   ],[m
   "dependencies": {[m
     "jquery": "*",[m
[31m-    "bootswatch": "*"[m
[32m+[m[32m    "bootswatch": "*",[m
[32m+[m[32m    "quill": "~0.17.2",[m
[32m+[m[32m    "bootstrap": "~3.2.0",[m
[32m+[m[32m    "bootstrap-wysihtml5": "*",[m
[32m+[m[32m    "summernote": "~0.5.3",[m
[32m+[m[32m    "font-awesome": "~4.1.0"[m
   }[m
 }[m
[1mdiff --git a/src/Maps/PageBundle/Form/PageType.php b/src/Maps/PageBundle/Form/PageType.php[m
[1mindex 413936b..a83311c 100644[m
[1m--- a/src/Maps/PageBundle/Form/PageType.php[m
[1m+++ b/src/Maps/PageBundle/Form/PageType.php[m
[36m@@ -17,7 +17,9 @@[m [mclass PageType extends AbstractType[m
         $builder[m
             ->add('name')[m
             ->add('url')[m
[31m-            ->add('text')[m
[32m+[m[32m            ->add('text', 'textarea', [[m
[32m+[m[32m                'attr' => array('class' => 'editor')[m
[32m+[m[32m            ])[m
             ->add('date', null, [[m
                 'label' => false,[m
                 'required' => false,[m
[1mdiff --git a/web/admin/css/main.css b/web/admin/css/main.css[m
[1mindex 16bfe6b..fa39f44 100644[m
[1m--- a/web/admin/css/main.css[m
[1m+++ b/web/admin/css/main.css[m
[36m@@ -16,3 +16,69 @@[m
 .inline-block {[m
   display: inline-block;[m
 }[m
[32m+[m
[32m+[m[32m.note-editor .btn-default {[m
[32m+[m[32m  color: #333333;[m
[32m+[m[32m  background-color: white;[m
[32m+[m[32m  border-color: #cccccc;[m
[32m+[m[32m}[m
[32m+[m[32m.note-editor .btn-default:hover, .note-editor .btn-default:focus, .note-editor .btn-default:active, .note-editor .btn-default.active {[m
[32m+[m[32m  color: #333333;[m
[32m+[m[32m  background-color: #e6e6e6;[m
[32m+[m[32m  border-color: #adadad;[m
[32m+[m[32m}[m
[32m+[m[32m.note-editor .open > .dropdown-toggle.btn-default {[m
[32m+[m[32m  color: #333333;[m
[32m+[m[32m  background-color: #e6e6e6;[m
[32m+[m[32m  border-color: #adadad;[m
[32m+[m[32m}[m
[32m+[m[32m.note-editor .btn-default:active, .note-editor .btn-default.active {[m
[32m+[m[32m  background-image: none;[m
[32m+[m[32m}[m
[32m+[m[32m.note-editor .open > .dropdown-toggle.btn-default {[m
[32m+[m[32m  background-image: none;[m
[32m+[m[32m}[m
[32m+[m[32m.note-editor .btn-default.disabled, .note-editor .btn-default[disabled] {[m
[32m+[m[32m  background-color: white;[m
[32m+[m[32m  border-color: #cccccc;[m
[32m+[m[32m}[m
[32m+[m[32m.note-editor fieldset[disabled] .btn-default {[m
[32m+[m[32m  background-color: white;[m
[32m+[m[32m  border-color: #cccccc;[m
[32m+[m[32m}[m
[32m+[m[32m.note-editor .btn-default.disabled:hover, .note-editor .btn-default[disabled]:hover {[m
[32m+[m[32m  background-color: white;[m
[32m+[m[32m  border-color: #cccccc;[m
[32m+[m[32m}[m
[32m+[m[32m.note-editor fieldset[disabled] .btn-default:hover {[m
[32m+[m[32m  background-color: white;[m
[32m+[m[32m  border-color: #cccccc;[m
[32m+[m[32m}[m
[32m+[m[32m.note-editor .btn-default.disabled:focus, .note-editor .btn-default[disabled]:focus {[m
[32m+[m[32m  background-color: white;[m
[32m+[m[32m  border-color: #cccccc;[m
[32m+[m[32m}[m
[32m+[m[32m.note-editor fieldset[disabled] .btn-default:focus {[m
[32m+[m[32m  background-color: white;[m
[32m+[m[32m  border-color: #cccccc;[m
[32m+[m[32m}[m
[32m+[m[32m.note-editor .btn-default.disabled:active, .note-editor .btn-default[disabled]:active {[m
[32m+[m[32m  background-color: white;[m
[32m+[m[32m  border-color: #cccccc;[m
[32m+[m[32m}[m
[32m+[m[32m.note-editor fieldset[disabled] .btn-default:active {[m
[32m+[m[32m  background-color: white;[m
[32m+[m[32m  border-color: #cccccc;[m
[32m+[m[32m}[m
[32m+[m[32m.note-editor .btn-default.disabled.active, .note-editor .btn-default[disabled].active {[m
[32m+[m[32m  background-color: white;[m
[32m+[m[32m  border-color: #cccccc;[m
[32m+[m[32m}[m
[32m+[m[32m.note-editor fieldset[disabled] .btn-default.active {[m
[32m+[m[32m  background-color: white;[m
[32m+[m[32m  border-color: #cccccc;[m
[32m+[m[32m}[m
[32m+[m[32m.note-editor .btn-default .badge {[m
[32m+[m[32m  color: white;[m
[32m+[m[32m  background-color: #333333;[m
[32m+[m[32m}[m
[1mdiff --git a/web/admin/js/main.js b/web/admin/js/main.js[m
[1mindex 2543152..3e5097d 100644[m
[1m--- a/web/admin/js/main.js[m
[1m+++ b/web/admin/js/main.js[m
[36m@@ -1,4 +1,4 @@[m
[31m-var confrimDelete;[m
[32m+[m[32mvar confrimDelete, injectEditor;[m
 [m
 confrimDelete = function() {[m
   return $(".deleteForm").submit(function(e) {[m
[36m@@ -10,6 +10,14 @@[m [mconfrimDelete = function() {[m
   });[m
 };[m
 [m
[32m+[m[32minjectEditor = function() {[m
[32m+[m[32m  return $('.editor').summernote({[m
[32m+[m[32m    height: 300,[m
[32m+[m[32m    focus: true[m
[32m+[m[32m  });[m
[32m+[m[32m};[m
[32m+[m
 $(function() {[m
[31m-  return confrimDelete();[m
[32m+[m[32m  confrimDelete();[m
[32m+[m[32m  return injectEditor();[m
 });[m
warning: LF will be replaced by CRLF in bower.json.
The file will have its original line endings in your working directory.
warning: LF will be replaced by CRLF in web/admin/css/main.css.
The file will have its original line endings in your working directory.
warning: LF will be replaced by CRLF in web/admin/js/main.js.
The file will have its original line endings in your working directory.
