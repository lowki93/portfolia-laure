load 'deploy' if respond_to?(:namespace) # cap2 differentiator

require 'capifony_symfony2'
load 'app/config/deploy'

namespace :deploy do
  desc "Recreate symlink"
  task :resymlink, :roles => :app do
    run "rm -f #{current_path} && ln -s #{release_path} #{current_path}"
  end
end

after "deploy:create_symlink", "deploy:resymlink", "deploy:update_crontab"