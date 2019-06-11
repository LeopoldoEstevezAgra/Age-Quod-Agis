<?php
namespace Deployer;

require 'recipe/symfony3.php';

// Project name
set('application', 'Age-Quod-Agis');

set('http_user', 'apache');

// Project repository
set('repository', 'ssh://git@github.com/LeopoldoEstevezAgra/Age-Quod-Agis.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true); 

// Shared files/dirs between deploys 
add('shared_files', []);
add('shared_dirs', ['web/download', 'web/upload']);

// Writable dirs by web server 
add('writable_dirs', ['web/upload']);
set('allow_anonymous_stats', false);

// Hosts

host('age-quod-agis')
    ->hostname('93.189.94.46')
    ->stage('production')
    ->user('root')
    ->set('deploy_path', '/var/www/html/{{application}}');

   
// Tasks

desc('Compile, minify and optimize assets');
task('deploy:assets_pack', function () {
    run('cd {{release_path}} && yarn install --ignore-engines --non-interactive');
    run('cd {{release_path}} && yarn run encore production');
});

desc('Load production environment variables');
 task('deploy:parameters_prod', function () {
    run('rm {{release_path}}/app/config/parameters.yml');
    upload("app/config/parameters_prod.yml", '{{release_path}}/app/config/parameters.yml');
})->onStage('production');

desc('Load staging environment variables');
task('deploy:parameters_sta', function () {
    run('rm {{release_path}}/app/config/parameters.yml');
    upload("app/config/parameters_sta.yml", '{{release_path}}/app/config/parameters.yml');
})->onStage('staging');

task('database:schema_update', function () {
    run('{{bin/php}} {{bin/console}} doctrine:schema:update --force {{console_options}}');
})->desc('Schema update');

// Override tasks

task('deploy:assets:install', function () {});
task('deploy:assetic:dump', function () {});

before('deploy:cache:clear', 'deploy:parameters_prod');
before('deploy:cache:clear', 'deploy:parameters_sta');
before('deploy:cache:warmup', 'database:schema_update');

before('deploy:cache:clear', 'deploy:assets_pack');

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

