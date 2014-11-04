require                     'capistrano_colors'

set :application,          "ardemis-intranet"

# multiple stages
set :stages,                ["prod"]
set :default_stage,         "prod"
set :stage_dir,             "app/config/deploy"
require                     'capistrano/ext/multistage'

# git
set :scm,                   :git
default_run_options[:pty] = true
set :ssh_options, {
    :forward_agent => true,
    :port => 10022
}

# shared files
set :shared_files,          ["app/config/parameters.yml"]
set :shared_children,       [app_path + "/logs", app_path + "/sessions", web_path + "/uploads"]

# project config
set :model_manager,         "doctrine"
set :interactive_mode,      false

# composer settings
set :composer_bin,          "composer"
set :use_composer,          true
set :update_vendors,        false
set :copy_vendors,          true
set :vendors_mode,          "install"

# assets settings
set :update_assets_version, false
set :assets_install,        true
set :assets_symlinks,       true
set :assets_relative,       false
set :dump_assetic_assets,   true

# permissions config
set :writable_dirs,         ["app/cache", "app/logs"]
set :webserver_user,        "www-data"
set :use_set_permissions,   false
set :use_sudo,              false

# misc
set :app_path,              "app"
set :keep_releases,         3

# Be less verbose by commenting the following line
logger.level = Logger::MAX_LEVEL

namespace :symfony do
    namespace :migrations do
        desc "Unmigrate latest migration"
        task :unmigrate, :roles => :app, :except => { :no_release => true } do
            capifony_pretty_print "--> Unmigrate Database"

            run "#{try_sudo} php #{previous_release}/app/console doc:mig:mig -n"
            capifony_puts_ok
        end
    end
end

# deployment tasks
before "symfony:composer:install", "symfony:assets:update_version"
after "deploy:rollback:cleanup",   "symfony:migrations:unmigrate"
after "deploy:create_symlink",     "symfony:doctrine:migrations:migrate"
after "deploy",                    "deploy:cleanup"

capistrano_color_matchers = [
  { :match => /ask_prod_confirmation/, :color => :green, :prio => 20, :attribute => :reverse },
]
colorize( capistrano_color_matchers )
