{
"title" : "Command Line Git for Beginners",
"author":"Mark Voorberg",
"tag":"How-To",
"category":"Software Development",
"meta-description": "Learn the basics of the Git command line."
}

If you've been around software developers for more than about 30 minutes you've probably heard about Git. Git is a distributed version control system that's pretty much the defacto standard at this point. 

Git is called a distributed version control system because each developer working on a Git codebase has a local copy that includes the full history of all changes. 

On a small team, or even on single person projects, it might initially seem easier to skip using a version control system altogether as the code is evolving for the better with each change. 

There are a couple very important considerations that should change your mind.

1. Hardware failure. Maybe you spill coffee into your laptop or it gets hit by lightning and won't boot anymore. Any work that exists only on your laptop is gone, maybe forever.
2. Changes to your code that involves multiple files and maybe take more than a few hours to implement. If your code is in a non-working state during the development of a given feature, you may get to a point where you decide that the current approach isn't working and you want to go back to previous point in time.
3. Multiple contributors. As soon as there's more than a single person working on a codebase, you will need a way to keep track of the latest version of your code. Who was the last person to edit a file and more specifically, what exactly did they change?

I could probably go on but, these points can't be argued with. Except maybe to decide which one should have been listed first!


### Terminology

When you use Git for your software development project, you store your code in a repository. The repository maintains a full running history of every file ever added to your project and each incremental change that was committed.

The repository will likely be hosted at a Git provider, such as GitHub, Bitbucket, GitLab etc. The repository, and your code will be stored on a server at your provider and a local copy of the repository, aka 'repo', will live on your own computer. The server repository is called the remote.

When you make changes to your local files, you can compare those files back to what they were before you made your changes. Once you're done editing, you commit those changes to the local repo with a comment. The comment should provide clues to your future self (and others) as to the nature of the changes.

Committing your code is the act of saving a set of changes to the repository. After successfully comitting your code to the local repo, you need to push them to the repo that lives on the server so that your teammates can see your changes too. 

  > When working with other developers on code that lives in Git, it's good practice 
  > to commit early and commit often.

Your teammates can see what you've comitted by doing a 'pull'. That means they are pulling changes from the repository on the server into the local repository on their computer. From there, they can see your code changes and make additional edits.

### Branching
If you consider that a repo is the path that your code takes as it evolves over time, a branch is when your code takes a slightly different path for a period of time. Often branches exist for only a short while after which they can be merged back into the main trunk (or path).

There's no practical limit to the number of branches you can have, but keeping them straight in your head can be difficult if there are too many or they aren't well named.

### Getting Started
Before using git you'll need to [install it](https://github.com/git-guides/install-git). Test your installation using `git --version`. 

After installing the Git client, you'll want to set your name and email address that you would like to attached to each commit so that your work is properly attributed.

```bash
$ git config --global user.name "Sally Smith"

$ git config --global user.email "sally@example.com"
```
After setting up your name and email, you can confirm them with the following:
```bash
$ git config --list
```

Before you start using Git, you'll want to [add an SSH key](https://docs.github.com/en/authentication/connecting-to-github-with-ssh/generating-a-new-ssh-key-and-adding-it-to-the-ssh-agent) so that you won't have to enter a password each time. When working with a GitHub repository, you'll often need to identify yourself using your username and password. An SSH key is an alternate way to identify yourself that doesn't require you to enter you username and password every time.



### Basic commands

* `git clone` is a command you can use to create a new local copy of a given repository. Using a clone allows you to push changes back up to the repo after making changes.

```bash
# Example cloning a repository
$ git clone git@github.com:transomjs/transom-core.git
```

* `git add` is a command used to add a file that is in the working directory to the staging area. This is used before committing files to your local repo.
```bash
# Adding all new and changed files to the staging area
$ git add -A

# OR add a specific file
$ git add README.md 
```

* `git status` is used to show the state of the files in your workspace and the local repository
```bash
# Show the state of my local changes
$ git status
```

* `git commit` is a command used to add all files that are staged to the local repository.
```bash
# Commiting all the staged files 
$ git commit -a -m"Put your commit message here"
```

* `git push` is a command used to add all committed files in the local repository to the remote repository. So in the remote repository, all files and changes will be visible to anyone with access to the remote repository.
```bash
# Pushing one or more local commits to the server
$ git push
```

* `git fetch` is a command used to get files (and branches) from the remote repository to the local repository but not into the working directory.
```bash
# Get any new branches or commits
$ git fetch
```

* `git merge` is a command used to get the files from a local repository into the working directory.
```bash

# Unwind a failed merge
$ git merge --abort
```

* `git pull` is command used to get files from the remote repository directly into the working directory. It is equivalent to a git fetch and a git merge.
```bash
# Get any new branches or commits
$ git pull

# The equivalent fetch & merge
$ git fetch
$ git merge origin/<current-branch>
```

* `git branch` is a command used to list and delete (or create) branches in the local repository.
```bash
# List all the branches, local and remote
git branch -a

# Delete a branch, both locally and remote
git branch -d <branch-name>
git push --delete origin <branch-name>

# Create a new branch, using the current one as a starting point
git branch <new-branch>

# In my opinion, the more practical command for this is `git checkout -b` 
# as it will checkout the new branch into your workspace.
```

* `git checkout` is used to change to a different branch in the local repository.
```bash
# Change to the 'develop' branch, updating files in the working directory
git checkout develop

# Create and checkout a new branch, creates & switches to the new branch 
git checkout -b <new-branch>
```

* `git reset` can be used to throw out local changes or cancel a failed merge.
```bash
# Reset all the changes back to the last commit.
# Note: This cannot be reverted!
$ git reset --hard HEAD

# Also see:
$ git merge --abort
```

These are just some of the git commands I use on a near daily basis. I generally prefer to use the command-line over tools that try to do it all for me as it gives me more control and I get better feedback about the process. 

### Wrap-up
The examples listed above are basic commands and there's a laundry list of options for each one. If you're learning Git on your own or in a team, I'd suggest you create a playground where you're able to try out these commands and see how they behave in real situations. Once you're comfortable with the basics, go ahead and start exploring the options for each of the different commands.