# General settings
set :domain, "srv01.we-spot-it.com"
set :deploy_to, "/var/www/test-bo.ardemispartners.com/web"
set :user, "root"
set :repository, "git@bitbucket.org:ardemis/profil_management.git"
set :branch, "develop"
set :clear_controllers, false

server domain, :app, :web, :primary => true

# Composer settings
set :composer_options, "--no-progress --verbose --optimize-autoloader"

task :ask_testbo_confirmation do
    set(:confirmed) do
        puts <<-WARN
            WARN
            answer = Capistrano::CLI.ui.ask " CONFIRM: Are you sure you want to continue? (Y) "
            if answer == 'Y' then true else false end
        end

        unless fetch(:confirmed)
        puts "\nDeploy cancelled!"
        exit
    end
end

before 'deploy', :ask_testbo_confirmation
