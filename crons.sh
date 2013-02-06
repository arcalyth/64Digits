# This file should be imported for full site operation.

#Ensure the 64D node service is running. If it failed, restart it.
a=(`ps -ef | grep node | grep 64_bouncer`)
if [ ! "$a" ]; then
	node node/64_bouncer.js
fi

#Update the GIT data. It outputs to a file which is read by the site.
./protected/yiic gitupdate
