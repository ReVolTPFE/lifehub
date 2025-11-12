# Module creation

## This process is not the final one, but a base working right now. I will improve it with time.

A new module requires several things to work :
- a new folder `/modules/ModuleNameInPascalCase`
- at the root path of this folder, add `ModuleNameModule.php` implementing 
  `LifeHub\Core\Interface\LifeHubModuleInterface` and add custom values for your module
- In `/config/packages/twig.yaml`, add a path `'%kernel.project_dir%/modules/ModuleName/templates': 'ModuleName'` for 
  your custom twig templates
- In `/config/routes/modules.yaml`, add the next config adapted to your module for the app to be able to read your controllers :
  ```yaml
    habits_module:
      resource: ../../modules/Habits/Controller/
      type: attribute
      prefix: /modules/habits
  ```
