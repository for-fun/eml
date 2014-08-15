gulp = require('gulp')
$ = require('gulp-load-plugins')()
src = 'app/Resources/'
out = 'web'

coffeeSrcAdmin = [src + '/admin/coffee/*.coffee']
compassSrcAdmin = [src + '/admin/sass/*.sass']

coffeeSrcSite = [src + '/site/coffee/*.coffee']
compassSrcSite = [src + '/site/sass/*.sass']

gulp.task 'coffeeAdmin', ->
  gulp
    .src(coffeeSrcAdmin)
    .pipe($.coffee(bare: true))
    .pipe(gulp.dest(out + "/admin/js"))


gulp.task 'compassAdmin', ->
  gulp
    .src(compassSrcAdmin)
    .pipe $.compass(
        style: 'expanded'
        environment: 'production'
        css: out + '/admin/css'
        sass: src + '/admin/sass'
        image: out + '/admin/images'
      )

gulp.task 'coffeeAdminSite', ->
  gulp
  .src(coffeeSrcSite)
  .pipe($.coffee(bare: true))
  .pipe(gulp.dest(out + "/site/js"))


gulp.task 'compassAdminSite', ->
  gulp
  .src(compassSrcSite)
  .pipe $.compass(
      style: 'expanded'
      environment: 'production'
      css: out + '/site/css'
      sass: src + '/site/sass'
      image: out + '/site/images'
    )


gulp.task 'watch', ->
  gulp.watch coffeeSrcAdmin, ['coffeeAdmin']
  gulp.watch compassSrcAdmin, ['compassAdmin']
  gulp.watch coffeeSrcSite, ['coffeeAdminSite']
  gulp.watch compassSrcSite, ['compassAdminSite']

gulp.task 'default', ['coffeeAdmin', 'compassAdmin', 'coffeeAdminSite', 'compassAdminSite', 'watch']