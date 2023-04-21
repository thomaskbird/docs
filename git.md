# Git

## Commands

### Squashing

Using the following command you can begin a rebase process and squash commits, the `-i` stands for interactive meaning that it will bring up an editor where you can look through your commits and decide what to keep. `HEAD~10` says to look at the last 10 commits.

`git rebase -i HEAD~10`

Once you trigger this command it will bring up an editor listing those commits with a `pick` next to each commit. For the commits you would like to squash add a `s` or `squash` next to each commit then save.

You are then able to run the following command:

`git push -f`

Since you have rewritten the history you will have to use the `-f` for force, option in order to push. If you try just `git push` you will receive an error.

---------
