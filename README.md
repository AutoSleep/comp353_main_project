# comp353_main_project

1. # Setup local env

---

- cd to the target folder

```http
git clone https://github.com/lzg-stack/comp353_main_project.git
```

- install git (cli version)

  https://git-scm.com/book/en/v2/Getting-Started-Installing-Git

- install php (cli) 

  ```
  brew install php@7.1
  ```

  https://www.youtube.com/watch?v=usYGrAi5PE8

- config your git 

  ```
  git config user.email "youremail@yourdomain.com"
  git config --list
  ```

  

2. # Git basic command line

---

https://brianway.github.io/2016/08/07/git-basic-git-commands/



3. # Run this application

---

Open your terminal:

Terminal 1 : 

```
ssh -L 3306:sxc353.encs.concordia.ca:3306 zho_lei@login.encs.concordia.ca

&N)h5vM6RbN,
```

Terminal 2 : 

``` php -S localhost:8080```

#### Open Terminal 1 and 2 in same time when you are coding.



---





# 🌟Important 

### Don't driectly write your code in master branch!!! 

### Open a new branch instead of directly or indirectly writing your code in master branch!!!

### Do following steps to open a new branch

```
git checkout -b <your branch's name>     // once your path's name change to <your branch's name>, the branch setup successfully
```

- The rule of naming the branch: ID_tagName_yourName.   For example: 01_login_Johnny

---

### extra_info: 

### DB_acc_pwd:

``` 
mysql -h sxc353.encs.concordia.ca -u sxc353_1 -p sxc353_1

team2020
```

Reference : https://docs.github.com/en/github/using-git

