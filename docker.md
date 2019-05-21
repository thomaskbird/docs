# Creating Docker Files

Every Docker file must start with a `FROM` which the value could be `scratch` which is explicitly an empty image. You can also start a docker image from any other valid docker image.

`FROM alpine:3.4`

## Different commands in dockerfiles:

- `FROM` - every Dockerfile starts with FROM, with the introduction of multi-stage builds as of version 17.05, you can have more than one FROM instruction in one Dockerfile.
COPY vs ADD - these two are often confused, so I’ll explain the difference.
ENV - well, setting environment variables is pretty important.
RUN - let’s run commands.
VOLUME - another source of confusion, what’s the difference between Dockerfile VOLUME and container volumes?
USER - when root is too mainstream.
WORKDIR - set the working directory.
EXPOSE - get your ports right.
ONBUILD - give more flexibility to your team and clients.

## Various docker commands

### Delete untagged images
docker rmi $(docker images | grep "^<none>" | awk "{print $3}")

### Delete all images
docker rm $(docker ps -a -q)

### Build
docker build -t <tag_name> <dir>

### Run
docker run --rm -p <port_exposed>:<port_running_app> <imageId>
- `--rm` - kills container after stopping

- Reference article - [https://takacsmark.com/dockerfile-tutorial-by-example-dockerfile-best-practices-2018/#what-is-a-dockerfile-and-why-youd-want-to-use-one](https://takacsmark.com/dockerfile-tutorial-by-example-dockerfile-best-practices-2018/#what-is-a-dockerfile-and-why-youd-want-to-use-one)