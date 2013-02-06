<?php

class GitUpdateCommand extends CConsoleCommand
{
	public function run($args)
	{
		$basedir = dirname(__FILE__)."/..";
		
		$git = array();
		$git['tag'] = exec("git describe"); //Gets current tag. This is our version number.
		$git['date'] = exec("git log -1 --format=\"%cd\""); //Gets current commit date. 
		$git['author'] = exec("git log --name-status HEAD^..HEAD | grep \"Author:\" | sed -e 's/........//'"); //Gets WHO commited the last commit. 

		//Needs to be done seperately, due to a multi-line command.
		
		exec("git log -5 > ".$basedir."/gitlog.temp.txt"); //Gets last 5 commits from log and post to file
		$tmpCommits = explode("\n\n",file_get_contents($basedir."/gitlog.temp.txt"));
		unlink($basedir."/gitlog.temp.txt");
		
		$commits = array();
		$commitIndex = -1; //Start at -1 to make things easier, since there are more than one \n\n that I need to capture per commit.
		for ($i=0;$i <count($tmpCommits);$i++){
			
			if (substr($tmpCommits[$i], 0, strlen("commit")) == "commit"){
				$commitIndex++;
				$commit = explode("\n",$tmpCommits[$i]);
				
				//The commit name (The huge string), author, and date.
				$commits[$commitIndex]['commit'] = trim(substr($commit[0],strpos($commit[0]," ")+1));
				$commits[$commitIndex]['author'] = trim(substr($commit[1],strpos($commit[1]," ")+1));
				$commits[$commitIndex]['date']   = trim(substr($commit[2],strpos($commit[2]," ")+1));
				
			}elseif (substr($tmpCommits[$i], 0, strlen("    ")) == "    "){	
				//Commit message
				$commits[$commitIndex]['message'] = nl2br(trim($tmpCommits[$i]));
				
			}
		}
		
		
		$git['commits'] = $commits;
		
		$success = file_put_contents($basedir."/data/git.json",json_encode($git,JSON_PRETTY_PRINT));
		if ($success){
			echo "Successfully updated: ".$basedir."/data.git.json\r\n";
		}else{
			echo "Failed to write file: ".$basedir."/data.git.json\r\n";
		}
	}
}