ustclib.douban
==============
这是中科大图书馆在Chrome或者Firefox的greasemonkey脚本源代码。在豆瓣读书旁自动显示这本书是否在中科大图书馆有相应的藏书，并提供详细说明链接。

本插件修改自 `ikandou.douban <https://github.com/fengli/ikandou.douban>`_ 我对fengli老师的javascript代码进行了修改，并用php写了一个可以从学校图书馆数据库查询的中介程序。

如何使用这个插件
==================

下载和安装插件
-------------

* 如果你是Chrome用户

  请猛击 `这个页面 <https://chrome.google.com/webstore/detail/%E4%B8%AD%E7%A7%91%E5%A4%A7%E5%9B%BE%E4%B9%A6%E9%A6%86%E8%B1%86%E7%93%A3%E6%8F%92%E4%BB%B6/ihjjbkpbdghopmmnnanadnnfcljcbicm>`_ ，点击页面右上角的Add To Chrome，就会自动安装到你的浏览器。

* 如果你是Firefox用户

  先安装 `greasemonkey <https://addons.mozilla.org/zh-CN/firefox/addon/greasemonkey/>`_ 插件
然后点击 `这个页面 <http://userscripts.org/scripts/show/163748>`_ 上方的install，就可以安装到Firefox了。

安装之后的效果
-----------------

比如豆瓣读书的 `这个页面 <http://book.douban.com/subject/1885170/>`_ ，会成为 `这个样子 <http://home.ustc.edu.cn/~congzhao/ustclib/smallProm.jpg>`_ 

如何测试安装时否成功
----------------

猛击豆瓣读书的 `这个页面 <http://book.douban.com/subject/1885170/>`_  ,如果显示跟上图一样，说明安装成功了。有任何问题或者建议，发送邮件到zhaocong89@gmail.com 。

如何贡献源代码到这个插件
====================
如果你有建议对这个插件进行改进，可以使用github 的 pull request，这儿是一个如何使用pull request的简单流程：

* Fork on GitHub (click Fork button)
* Clone to computer ($ git clone git@github.com:you/ikandou.douban.git)
* Don't forget to cd into your repo: ($ cd ikandou.douban/)
* Set up remote upstream ($ git remote add upstream git@github.com:fengli/ikandou.douban.git)
* Create a branch for new issue ($ git checkout -b 100-new-feature, if you don't have a bug report no worries just skip the number)
* Develop on issue branch. [Time passes, the main ikandou repository accumulates new commits]
* Commit changes to issue branch. ($ git add . ; git commit -m 'commit message')
* Fetch upstream ($ git fetch upstream)
* Update local master ($ git checkout master; git pull upstream master)
* Repeat steps 5-8 till dev is complete
* Rebase issue branch ($ git checkout 100-new-feature; git rebase master)
* Push branch to GitHub ($ git push origin 100-new-feature)
* Issue pull request (Click Pull Request button)

