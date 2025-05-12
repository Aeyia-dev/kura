#!/bin/bash
set +e

if [ -f .env ]; then
    . .env
else
    echo "Error: .env file not found"
    exit 1
fi

# Notify Rollbar of successful deployment
if [ -z "$ROLLBAR_TOKEN" ]; then
    echo "Error: ROLLBAR_TOKEN not found in .env file"
    exit 1
fi

echo "Rollbar Track Deploy for $APP_ENV"

REVISION=$(git rev-parse --short HEAD)
COMMIT_USER=$(git log -1 --pretty=format:'%an')
COMMIT_MSG=$(git log -1 --pretty=format:'%s')
LOCAL_USER=$(whoami)

curl -H "X-Rollbar-Access-Token: $ROLLBAR_TOKEN" \
     -H "Content-Type: application/json" \
     -X POST 'https://api.rollbar.com/api/1/deploy' \
     -d "{
       \"environment\": \"$APP_ENV\",
       \"revision\": \"$REVISION\",
       \"rollbar_name\": \"$COMMIT_USER\",
       \"local_username\": \"$LOCAL_USER\",
       \"comment\": \"$COMMIT_MSG\",
       \"status\": \"succeeded\"
     }"
