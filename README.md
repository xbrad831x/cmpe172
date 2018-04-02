# CMPE 172 HW #1 - Team Mystic
## Getting Started with Ansible
This is a simple exercise to help us get acquainted with Ansible and its powerful configuration capabilities. To get started, [make sure you have Ansible installed](http://docs.ansible.com/ansible/latest/intro_installation.html) on the OS of your choice.

We are running our server on Amazon Web Services and connecting to it via public key authenticated `ssh`. In order to run a playbook, make sure you have the correct private key `test.pem` stored in your `~/Downloads` folder. You may have to change permissions on the file in order for it to work:

~~~bash
$ chmod 400 ~/Downloads/test.pem
~~~

Use the following command in the project directory to run a playbook:

~~~bash
$ ansible-playbook <play>.yml
~~~

The test website can be viewed [here](http://ec2-18-219-141-153.us-east-2.compute.amazonaws.com)..

## Contributors
* Brandon Mercado - [xbrad831x](https://github.com/xbrad831x)
* Luis Arevalo - [luisarevalo21](https://github.com/luisarevalo21)
* Brandon Cecilio - [vennturtle](https://github.com/vennturtle)
* Haoyang Liu - [lhy2016](https://github.com/lhy2016)

## License

This project is licensed under the MIT License - see the [LICENSE.md](/LICENSE.md) file for details

## Acknowledgements
* Amazon Web Services is offered by [Amazon Web Services, Inc](https://aws.amazon.com/)
* Ansible was created by [Michael DeHaan](https://github.com/mpdehaan) and is sponsored by [Ansible, Inc](https://www.ansible.com/)
* Development supported by our professor at SJSU, Prof. Andrew H. Bond
