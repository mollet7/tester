#!/bin/bash

# Add all changes
git add .

# Prompt for commit message
read -p "Enter commit message: " message

# Commit changes
git commit -m "$message"

# Push changes to remote repository
git push
