#!/bin/bash

CWD=$(dirname $0)
docker build -t mobomo/govcon2021_web -f ${CWD}/docker/dockerfile ${CWD}