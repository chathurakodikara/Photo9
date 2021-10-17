
## About App

Everyone has a Facebook account so you know it is imposible to track what we posted. the app provided the 100 photos that you posted of Facebook. You can choose the best 9 photos and add to your own photo collection

The application configured as multitenant application. User only show their photos. I have use Multitenantable traits in the Photo model 


## Tech Pack

- [Laravel 8](https://laravel.com/docs/8.x).
- [Livewire for better user experience](https://laravel-livewire.com/docs/2.x/quickstart).
- [Tailwind CSS for styles](https://tailwindcss.com/docs).
- MySQL as Database.



## Packages in the project
- [Laravel Socialite for social login](https://laravel.com/docs/8.x/socialite).
- [barryvdh's laravel-debugbar](https://github.com/barryvdh/laravel-debugbar).
- Quickly make outgoing HTTP requests [ Guzzle HTTP client](https://laravel.com/docs/8.x/http-client).



## How to Configure

- Step 1

* Clone git repo
* Go to your folder and open with a code editor (VS code, Sublime text etc)
* Use CMD and run composer install to install php packages
* Then run npm install for node packages
* After that npm run dev to build node assets. 
* Migrate database (php artisan migrate) 
* I have provided faker for User and Image model. php artisan db:seed will insert the data


- Step 2 time to create the app account

* Create Facebook Developer account using https://developers.facebook.com/apps/
* You can login using your Facebook username and password
* Then click on Create App button. it might be in the right side
* Select an app type. I prefer "Consumer" one and click next
* You can add your details Display name, App Contact Email and Business Manager Account witch is an optional
* Facebook will ask you’re to conform your password


- Step 3 - .env file configaration

- Feel free to use the sample env file provide with the project
- Create a database and update your .env file
- Finaly update your Facebook CLIENT_ID and CLIENT_SECRET. The information can be found in the Facebook developer account you created
- 
- **FACEBOOK_CLIENT_ID
- **FACEBOOK_CLIENT_SECRET

