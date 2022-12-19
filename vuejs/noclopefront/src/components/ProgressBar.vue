<template>
    <div id="progress-bar-battery">
      <svg
        id="battery-progress"
        :style="batteryStyleSvgFrame"
      >
        <rect
          :fill="backgroundColor"
          stroke-width="3"
          :style="batteryStyleFrame"
          rx="5"
          ry="5"
        />
        <rect
          :fill="backgroundColor"
          stroke-width="3"
          :x="defaultOptions.layout.width"
          :y="defaultOptions.layout.height / 4"
          :width="defaultOptions.layout.width / 16"
          :height="defaultOptions.layout.height / 2"
          rx="1"
        />
        <rect
          :fill="progressColor"
          :x="defaultOptions.layout.progressPadding / 2"
          :y="defaultOptions.layout.progressPadding / 2"
          :style="batteryProgress"
        />
        <text
          :style="textStyle"
          :x="horizontalTextAlignP"
          :y="verticalTextAlignP"
        >
          {{ value }}%
        </text>
      </svg>
    </div>
  </template>
  
  <script>
  import { ProgressBar } from './ProgressBar.vue'
  export default {
    name: 'ProgressBar',
    mixins: [ProgressBar],
    props: {
      options: {
        type: Object,
        required: false,
        default: () => {}
      },
      value: {
        type: Number,
        required: false,
        default: 0
      }
    }
  }
  </script>