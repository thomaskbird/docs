# Git

## Commands

-------

### Squashing

Using the following command you can begin a rebase process and squash commits, the `-i` stands for interactive meaning that it will bring up an editor where you can look through your commits and decide what to keep. `HEAD~10` says to look at the last 10 commits.

`git rebase -i HEAD~10`

Once you trigger this command it will bring up an editor listing those commits with a `pick` next to each commit. For the commits you would like to squash add a `s` or `squash` next to each commit then save.

You are then able to run the following command:

`git push -f`

Since you have rewritten the history you will have to use the `-f` for force, option in order to push. If you try just `git push` you will receive an error.

---------

### Rebasing a feature
Example:

1. You have a main branch
2. You checkout a feature branch
3. You make any number of commits to your feature
4. During that time any number of commits have been made to main
5. Instead of having your commits on top of the point you made your feature branch back in step #2 you want it them to show up after the latest commit to main

How to:
1. Checkout the feature branch where your changes were made
2. Then rebase the main branch onto your feature branch by running the following command: git rebase main

---------
