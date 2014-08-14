gulp = require('gulp')
$ = require('gulp-load-plugins')()
src = 'app/Resources/'
out = 'web'

coffeeSrcAdmin = [src + '/admin/coffee/*.coffee']
compassSrcAdmin = [src + '/admin/sass/*.sass']

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

gulp.task 'watch', ->
  gulp.watch coffeeSrcAdmin, ['coffeeAdmin']
  gulp.watch compassSrcAdmin, ['compassAdmin']

gulp.task 'default', ['coffeeAdmin', 'compassAdmin', 'watch']