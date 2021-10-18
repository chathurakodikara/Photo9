
## About App

Everyone has a Facebook account so you know it is imposible to track what we posted. the app provided the 100 photos that you posted of Facebook. You can choose the best 9 photos and add to your own photo collection

The application configured as multitenant application. User only show their photos. I have use Multitenantable traits in the Photo model 



## Tech Pack

- [Laravel 8](https://laravel.com/docs/8.x).
- [Livewire for better user experience](https://laravel-livewire.com/docs/2.x/quickstart).
- [Tailwind CSS for styles](https://tailwindcss.com/docs).
- MySQL as Database.

## API Documntation 
- [Postman documenter](https://documenter.getpostman.com/view/12479368/UV5WDdo6)


## Packages in the project
- [Laravel Socialite for social login](https://laravel.com/docs/8.x/socialite).
- [barryvdh's laravel-debugbar](https://github.com/barryvdh/laravel-debugbar).
- Quickly make outgoing HTTP requests [ Guzzle HTTP client](https://laravel.com/docs/8.x/http-client).



## How to Configure

#### Step 1

* Clone git repo
```shell
:~# git clone https://github.com/chathurakodikara/Photo9.git
```
* Go to your folder and open with a code editor (VS code, Sublime text etc)
* Use CMD and run composer install to install php packages
```shell
:~# composer install
```
* Then run npm install for node packages
```shell
:~# npm install && npm run dev
```
* Migrate database 
* I have provided faker for User and Image model. php artisan db:seed will insert the data

```shell
:~# php artisan migrate --seed
```



#### Step 2 - time to create the app account
I am planing to do a video on how to create a facebook app for aouth very zoon

* Please create a Facebook Developer account using https://developers.facebook.com/apps/
* then create a app with oauth loagin. 
* We need facebook app searet and app id to countine.

#### Step 3 - update .env file 

- Feel free to use the sample env file provide with the project
- Create a database and update your .env file
- Finaly update your Facebook CLIENT_ID and CLIENT_SECRET. The information can be found in the Facebook developer account you created

```shell
:~# FACEBOOK_CLIENT_ID=
:~# FACEBOOK_CLIENT_SECRET=
```
#### Step 4
its time run the application and enjoy
```shell
:~# php artisan serve
```


## I am working on..
* I stuck when creating test cases for OAuth. Got an issue with Mockery user and faking the process of login. If someone know where I got wrong. Please let me know. I am keen to lean about it  

* Having a Docker container is grate. I already have a setup with me. However I feel it should improve. The Docker container will coming soon.. 